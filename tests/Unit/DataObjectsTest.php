<?php
use PHPUnit\Framework\TestCase;
use TwilioPlayground\DataObjects\BaseDataObject;
use TwilioPlaygroundTest\DataObjects\TestDataObject;

require_once 'vendor/autoload.php';

class DataObjectsTest extends TestCase {

	public function testBasicAssertion(): void {
		$this->assertInstanceOf(BaseDataObject::class, new TestDataObject(array(
			'name' => 'Adam McGurk',
			'id' => 1234
		)));
	}

	public function testThrowsOnEmpty(): void {
		$this->expectException(InvalidArgumentException::class);
		new TestDataObject(array());
	}

	public function testThrowsOnWrongParamsSent(): void {
		$this->expectException(UnexpectedValueException::class);
		new TestDataObject(array(
			'doesnotexist' => 'This prop shouldn\'t exist'
		));
	}

}