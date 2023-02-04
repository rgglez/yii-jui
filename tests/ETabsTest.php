<?php

require_once '/var/www/framework/test/CTestCase.php';
require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'ETabs.php');

class ETabsTest extends CTestCase {

	protected $ajaxTabs = array();
	
	public function testContainAttributes() {
		$mensaje = 'This attribute is not in the class';
		
		$this->assertClassHasAttribute( 'ajaxTabs', 'ETabs', $mensaje );
		$this->assertClassHasAttribute( 'body', 'ETabs', $mensaje );
		$this->assertClassHasAttribute( 'validOptions', 'ETabs', $mensaje );
		$this->assertClassHasAttribute( 'validCallbacks', 'ETabs', $mensaje );		
	}	
	
	public function testGetAjaxTabs() {
		$objeto = new ETabs;
		
		$objeto->setAjaxTabs( $this->ajaxTabs );
		$this->assertEquals( $this->ajaxTabs, $objeto->getAjaxTabs() );
	}
}
?>