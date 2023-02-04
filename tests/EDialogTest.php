<?php

require_once '/var/www/framework/test/CTestCase.php';
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'EDialog.php');

class EDialogTest extends CTestCase {
	
	protected $body = null;
	protected $buttons = array();
	
	public function testContainAttributes() {
		$mensaje = 'this attribute is not in the class';
		
		$this->assertClassHasAttribute( 'body', 'EDialog', $mensaje );	
		$this->assertClassHasAttribute( 'buttons', 'EDialog', $mensaje );
		$this->assertClassHasAttribute( 'validOptions', 'EDialog', $mensaje );
		$this->assertClassHasAttribute( 'validCallbacks', 'EDialog', $mensaje );
	}
	
	public function testGetBody() {
		$objeto = new EDialog;
		$objeto->setBody( $this->body );
		$this->assertEquals( $this->body, $objeto->getBody() );	
	}
	
	public function testGetButtons() {
		$objeto = new EDialog;
		$objeto->setButtons( $this->buttons );
		$this->assertEquals( $this->buttons, $objeto->getButtons() );
	}		
}

?>