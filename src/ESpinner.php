<?php
/**
 * ESpinner class file.
 *
 * @author Rodolfo Gonzalez <rodolfo.gonzalez@gmail.com>
 * @version 2.5.0
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2012 Rodolfo Gonzalez
 * @license dual GPL (3.0 or later) and MIT, at your choice.
 * @license http://www.opensource.org/licenses/mit-license.php
 * @license http://www.opensource.org/licenses/gpl-3.0.php
 *
 * See doc/gpl-3.0.txt and doc/MIT-LICENSE.txt for the full text of the
 * licenses.
 *
 * The MIT license:
 *
 * Copyright (c) 2012 Rodolfo Gonzalez
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * The GPL license:
 *
 * Copyright (C) 2012 Rodolfo Gonzalez
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'EJqueryUiWidget.php');

/**
 * ESpinner
 *
 * @package application.extensions.jui
 * @author rodolfo
 */
class ESpinner extends EJqueryUiWidget
{
   //***************************************************************************
   // Configuration.
   //***************************************************************************

   /**
    * @var boolean whether to use the bundled jquery.mousewheel.js plugin.
    */
   public $useBundledMousewheel = true;

   //***************************************************************************
   // Internal properties.
   //***************************************************************************

	/**
	 * The valid script Options for the widget.
	 *
	 * See @link http://jqueryui.com/demos/spinner/#options
	 *
	 * @var array
	 */
	protected $validOptions = array(
		'incremental'=>array('type'=>'boolean'), // Default: true
		'max'=>array('type'=>'integer'), // Default: null
		'min'=>array('type'=>'integer'), // Default: null
		'numberFormat'=>array('type'=>'string'), // Default: ''
		'page'=>array('type'=>'integer'), // Default: 10
		'step'=>array('type'=>'integer'), // Default: 1
	);

   /**
    * Valid callbacks.
    *
    * @var array
    */
   protected $validCallbacks = array(
		'change',
		'spin',
		'start',
		'stop',
   );

   //***************************************************************************
   // Utilities.
   //***************************************************************************

   /**
    * Register scripts.
    */
   public function registerClientScripts()
   {
      parent::registerClientScripts();

      if ($this->useBundledMousewheel) {
         Yii::app()->clientScript->registerScriptFile($this->baseUrl.'/external/jquery.mousewheel-3.0.4.js');
      }
   }

   protected function makeOptions()
   {
      $options = array();
      foreach ($this->callbacks as  $key=>$val) {
         $options['callback_'.$key] = '';
      }

      $encodedOptions = CJavaScript::encode(array_merge($options, $this->options));

      foreach ($this->callbacks as $key=>$val) {
         $encodedOptions = str_replace("'callback_{$key}':''", "{$key}:{$val}", $encodedOptions);
      }

      return $encodedOptions;
   }

   /**
    * Generates the JS code for the widget.
    *
    * @param string $id
    */
   protected function jsCode($id)
   {
      $options = $this->makeOptions();

      $script =<<<EOP
jQuery('#{$id}').spinner({$options});
EOP;
      return $script;
   }

   /**
    * Generates the HTML markup for the widget
    *
    * @param string $id
    * @return string
    */
   protected function htmlCode($id, $name)
   {
      $this->htmlOptions['id'] = $id;

      if ($this->hasModel())
         $html = CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
      else
         $html = CHtml::textField($name, $this->value, $this->htmlOptions);

      return $html;
   }

   //***************************************************************************
   // Run Lola Run
   //***************************************************************************

   /**
    * Init.
    */
   public function init()
   {
      list($name, $id) = $this->resolveNameID();

      $this->publishAssets();
      $this->registerClientScripts();

      $js = $this->jsCode($id);
      $this->clientScript->registerScript('Yii.'.get_class($this).'#'.$id, $js, CClientScript::POS_READY);
   }

   /**
    * Run.
    */
   public function run()
   {
      list($name, $id) = $this->resolveNameID();

      $html = $this->htmlCode($id, $name);
      echo $html;
   }
}