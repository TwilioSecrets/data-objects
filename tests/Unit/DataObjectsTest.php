<?php
use PHPUnit\Framework\TestCase;
use TwilioPlayground\DataObjects\BaseDataObject;
use TwilioPlaygroundTest\DataObjects\TestDataObject;

require_once 'vendor/autoload.php';

class DataObjectsTest extends TestCase {

	function testBasicAssertion(): void {
		$this->assertInstanceOf(BaseDataObject::class, new TestDataObject(array(
			'name' => 'Adam McGurk',
			'id' => 1234
		)));
	}

	function testThrowsOnEmpty(): void {
		$this->expectException(InvalidArgumentException::class);
		new TestDataObject(array());
	}

	function testThrowsOnWrongParamsSent(): void {
		$this->expectException(UnexpectedValueException::class);
		new TestDataObject(array(
			'doesnotexist' => 'This prop shouldn\'t exist'
		));
	}

}