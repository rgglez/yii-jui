<?php

require_once '/var/www/framework/test/CTestCase.php';
require_once(dirname(__File__).DIRECTORY_SEPARATOR.'EJqueryUiInclude.php');

class EJqueryUiIncludeTest extends CTestCase {

	protected $theme = 'base';
	protected $compression = 'none';
	protected $useBundledStyleSheet = true;

	public function testGetTheme() {
		$objeto = new EJqueryUiInclude;
		
		$objeto->setTheme( $this->theme );
		$this->assertEquals( $this->theme, $objeto->getTheme() );
	}
	
	public function testGetCompression() {
		$objeto = new EJqueryUiInclude;
		
		$objeto->setCompression( $this->compression );
		$this->assertEquals( $this->compression, $objeto->getCompression() );
	}
	
	public function testGetUseBundledStyleSheet() {
		$objeto = new EJqueryUiInclude;
		
		$objeto->setUseBundledStyleSheet( $this->useBundledStyleSheet );
		$this->assertEquals( $this->useBundledStyleSheet, $objeto->getUseBundledStyleSheet() );
	}
}

?>