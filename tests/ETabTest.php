<?php

require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'ETab.php');
require_once '/var/www/framework/test/CTestCase.php';


class ETabTest extends CTestCase {
	
	protected $title = '';
	
	public function testContainAttributes() {
		$mensaje = 'This Attribute is not in the class';
		
		$this->assertClassHasAttribute( 'title', 'ETab', $mensaje );
		$this->assertClassHasAttribute( 'body', 'ETab', $mensaje );	
	}
	
	public function testGetTitle() {
		$objeto = new ETab;
		
		$objeto->setTitle( $this->title );
		$this->assertEquals( $this->title, $objeto->getTitle() );
	}
}
?>