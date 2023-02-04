<?php

require_once '/var/www/framework/test/CTestCase.php';
require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'EJqueryUiWidget.php');

class EJqueryUiWidgetTest extends CTestCase {

	protected $options = array();	
	protected $callbacks = array();
	protected $baseUrl = '';
	protected $clientSricpt = null;
	protected $validOptions = array();
	protected $validCallbakcs = array();
	protected $theme = 'base';
	protected $compression = 'packed';
	protected $useBundledStyleSheet = true;
	
	public function testContainAttributes() {
		$mensaje = 'The attribute is not in the class';		
		
		$this->assertClassHasAttribute( 'callbacks', 'EJqueryUiWidget', $mensaje );
		$this->assertClassHasAttribute( 'baseUrl', 'EJqueryUiWidget', $mensaje );
		$this->assertClassHasAttribute( 'clientScript', 'EJqueryUiWidget', $mensaje );
		$this->assertClassHasAttribute( 'validOptions', 'EJqueryUiWidget', $mensaje );
		$this->assertClassHasAttribute( 'validCallbacks', 'EJqueryUiWidget', $mensaje );	
	}	
	
	public function testGetOptions() {
		$objeto = new EJqueryUiWidget;
		
		$objeto->setOptions( $this->options );		
		$this->assertEquals( $this->options, $objeto->getOptions() );
	}
	
	public function testGetCallbacks() {
		$objeto = new EJqueryUiWidget;
		
		$objeto->setCallbacks( $this->callbacks );
		$this->assertEquals( $this->callbacks, $objeto->getCallbacks() );
	}
	
	public function testGetTheme() {
		$objeto = new EJqueryUiWidget;
		
		$objeto->setTheme( $this->theme );
		$this->assertEquals( $this->theme, $objeto->getTheme() );
	}
	
	public function testGetCompression() {
		$objeto = new EJqueryUiWidget;
		
		$objeto->setCompression( $this->compression );
		$this->assertEquals( $this->compression, $objeto->getCompression() );
	}
	
	public function testGetUseBundledStyleSheet() {
		$objeto = new EJqueryUiWidget;
		
		$objeto->setUseBundledStyleSheet( $this->useBundledStyleSheet );
		$this->assertEquals( $this->useBundledStyleSheet, $objeto->getUseBundledStyleSheet() );
	}
}
?>