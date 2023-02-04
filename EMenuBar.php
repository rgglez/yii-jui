<?php
/**
 * EMenuBar class file.
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
 * EMenuBar is a wrapper for the experimental jQuery UI MenuBar widget. This
 * extension is also experimental, so API will change.
 *
 * @package application.extensions.jui
 * @author rodolfo
 */
class EMenuBar extends EJqueryUIWidget
{
   //***************************************************************************
   // Internal properties
   //***************************************************************************

	/**
	 * The valid script Options for the progressbar widget.
	 *
	 * See @link http://jqueryui.com/demos/progressbar/#options
	 *
	 * @var array
	 */
	protected $validOptions = array(
		 'autoExpand'=>array('type'=>'boolean'), // default: false
       'buttons'=>array('type'=>'boolean'), // default: false
       'menuIcon'=>array('type'=>'boolean'), // default false
       'position'=>array('type'=>'array'),
	);

   //***************************************************************************
   // Utilities
   //***************************************************************************

   /**
	* Generates the javascript code for the widget
	* @return string
	*/
	protected function jsCode($id)
	{
      $script =<<<EOP
jQuery("#{$id}").menubar();
EOP;
		return $script;
	}

   //***************************************************************************
   // Run Lola Run
   //***************************************************************************

   /**
    * Init.
    *
    * @throws Exception
    */
   public function init()
   {
      if (!_EXPERIMENTAL_) {
         throw new Exception('Experimental mode must be used with this extension, since jQuery UI menu is available only in 1.9 milestones.');
      }

      list($name, $id) = $this->resolveNameID();

      Yii::app()->clientScript->registerScript('Yii.'.get_class($this).'#'.$id, $this->jsCode($id), CClientScript::POS_READY);

      ob_start();
   }

   /**
    * Run.
    */
   public function run()
   {
      $menu = ob_get_contents();
      ob_end_clean();

      list($name, $id) = $this->resolveNameID();

      echo CHtml::tag('div', array('id'=>'div_'.$id), $menu);
   }
}