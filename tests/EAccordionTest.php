<?php

require_once '/var/www/framework/test/CTestCase.php';
require_once '/var/www/testdrive/protected/extensions/jui/EAccordion.php';

class EAccordionTest extends CTestCase {

	protected $body = '';
	protected $_panels = array();
	protected $headerHtml = 'h3';
	protected $_functions = array();
	protected $_useEasing = false;
	
	public function testContainAttributes() {
		$mensaje = 'This Attribute is not in the Class';
		
		$this->assertClassHasAttribute( '_panels', 'EAccordion', $mensaje );
		$this->assertClassHasAttribute( '_headerHtml', 'EAccordion', $mensaje );
		$this->assertClassHasAttribute( '_functions', 'Eaccordion', $mensaje );
		$this->assertClassHasAttribute( '_useEasing', 'EAccordion', $mensaje );		
		$this->assertClassHasAttribute( 'body', 'EAccordion', $mensaje );
	}	
	
	public function testGetPanels() {
		$objeto = new EAccordion;
		$objeto->setPanels( $this->_panels );
		$this->assertEquals( $this->_panels, $objeto->getPanels() );
	}
	
	public function testGetHeaderHtml() {
		$objeto = new EAccordion;
		$objeto->setHeaderHtml( $this->headerHtml );
		$this->assertEquals( $this->headerHtml, $objeto->getHeaderHtml() );
	}
	
	public function testGetFunctions() {
		$objeto = new EAccordion;
		$objeto->setFunctions( $this->_functions );
		$this->assertEquals( $this->_functions, $objeto->getFunctions() );
	}
	
	public function testGetUseEasing() {
		$objeto = new EAccordion;
		$objeto->setUseEasing( $this->_useEasing );
		$this->assertEquals( $this->_useEasing, $objeto->getUseEasing() );
	}
}

?>