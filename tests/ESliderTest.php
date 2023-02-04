<?php

require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'ESlider.php');
require_once '/var/www/framework/test/CTestCase.php';

class ESliderTest extends CTestCase {
	
	protected $value = null;
	protected $enabled = true;
	protected $minValue = -100.00;
	protected $maxValue = 100.00;
	protected $step = 1.0;
	protected $range = false;
	protected $animate = false;
	protected $numberOfHandlers = 1;
	protected $linkedElements = array();
	protected $linkedRangeElement = 'test';
	protected $showValueOn = 'slide';
	
	public function testContainAttributes() {
		$mensaje = 'This attribute is not in the class';
		$this->assertClassHasAttribute( 'showValueOn', 'ESlider', $mensaje );		
		$this->assertClassHasAttribute( 'linkedRangeElement', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'linkedElements', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'numberOfHandlers', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'animate', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'range', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'step', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'minValue', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'maxValue', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'enabled', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'numberOfHandlers', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'value', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'validOptions', 'ESlider', $mensaje );
		$this->assertClassHasAttribute( 'validCallbacks', 'ESlider', $mensaje );
	}

	public function testGetShowValueOn() {
		$objeto = new ESlider;
		$objeto->setShowValueOn( $this->showValueOn );
		$this->assertEquals( $this->showValueOn, $objeto->getShowValueOn() );
	}
	
	public function testGetLinkedRangeElement() {
		$objeto = new ESlider;
		$objeto->setLinkedRangeElement( $this->linkedRangeElement );
		$this->assertEquals( $this->linkedRangeElement, $objeto->getLinkedRangeElement() );
	}
	
	public function testGetLinkedElements() {
		$objeto = new ESlider;
		$objeto->setLinkedElements( $this->linkedElements );
		$this->assertEquals( $this->linkedElements, $objeto->getLinkedElements() );
	}
	
	public function testGetNumberOfHandlers() {
		$objeto = new ESlider; 
		$objeto->setNumberOfHandlers( $this->numberOfHandlers );
		$this->assertEquals( $this->numberOfHandlers, $objeto->getNumberOfHandlers() );
	}
	
	public function testGetAnimate() {
		$objeto = new ESlider;
		$objeto->setAnimate( $this->animate );
		$this->assertEquals( $this->animate, $objeto->getAnimate() );
	}
	
	public function testGetRange() {
		$objeto = new ESlider;
		$objeto->setRange( $this->range );
		$this->assertEquals( $this->range, $objeto->getRange() );
	}
	
	public function testGetStep() {
		$objeto = new ESlider;
		$objeto->setStep( $this->step );
		$this->assertEquals( $this->step, $objeto->getStep() );
	}
	
	public function testGetMinValue() {
		$objeto = new ESlider;
		$objeto->setMinValue( $this->minValue );
		$this->assertEquals( $this->minValue, $objeto->getMinValue() );
	}
	
	public function testGetMaxValue() {
		$objeto = new ESlider; 
		$objeto->setMaxValue( $this->maxValue );
		$this->assertEquals( $this->maxValue, $objeto->getMaxValue() );
	}
	
	public function testGetEnabled() {
		$objeto = new ESlider;
		$objeto->setEnabled( $this->enabled );
		$this->assertEquals( $this->enabled, $objeto->getEnabled() );		
	}
}
?>