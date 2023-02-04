<?php

require_once '/var/www/framework/test/CTestCase.php';
require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'EJqueryUiConfig.php');

class EJqueryUiConfigTest extends CTestCase {
	
	protected $theme = 'base';
	protected $compression = 'packed';
	protected $useBundledStyleSheet = true;
	
	public function testContainAttributes() {
		$mensaje = 'This attribute is not in the class';
		
		$this->assertClassHasAttribute( 'theme', 'EJqueryUiConfig', $mensaje );
		$this->assertClassHasAttribute( 'compression', 'EJqueryUiConfig', $mensaje );
		$this->assertClassHasAttribute( 'useBundledStyleSheet', 'EJqueryUiConfig', $mensaje );
		$this->assertClassHasAttribute( 'instance', 'EJqueryUiConfig', $mensaje );	
		$this->assertClassHasAttribute( 'validThemes', 'EJqueryUiConfig', $mensaje );
	}	
	
	public function testGetTheme() {		
				
		EJqueryUiConfig::singleton()->setTheme( $this->theme );
		$this->assertEquals( $this->theme, EJqueryUiConfig::singleton()->getTheme() );		
	}

	public function testGetCompression() {
				
		EJqueryUiConfig::singleton()->setCompression( $this->compression );
		$this->assertEquals( $this->compression, EJqueryUiConfig::singleton()->getCompression() );
	}
	
	public function getUseBundledStyleSheet() {
				
		EJqueryUiConfig::setUseBundledStyleSheet( $this->useBundledStyleSheet );
		$this->assertEquals( $this->useBundledStyleSheet, EJqueryUiConfig::singleton()->getUseBundledStyleSheet() );	
	}	
}
?>