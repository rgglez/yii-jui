<?php



require_once("/var/www/yii/framework/test/CDbTestCase.php");

include_once("/var/www/testdrive/protected/extensions/jui/EDatePicker.php");


class EDatePickerTest extends CDbTestCase
{
	
	public $valor = 'show1';

		
		public function testEffect()
		{
			//EDatePicker::setEffect($this->valor);
			//$this->assertEquals($this->valor,EDatePicker::getEffect());
			}		
	}

?>