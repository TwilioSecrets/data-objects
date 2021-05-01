<?php
use PHPUnit\Framework\TestCase;
use TwilioPlayground\DataObjects\BaseDataObject;
use TwilioPlaygroundTest\DataObjects\TestDataObject;

require_once 'vendor/autoload.php';

class DataObjectsTest extends TestCase {

	private $test_data_object;
	private static $name = 'Adam McGurk';
	private static $id = 1234;

	function setUp(): void {
		$this->test_data_object = new TestDataObject(array(
			'name' => self::$name,
			'id' => self::$id
		));
	}

	function testBasicAssertion(): void {
		$this->assertInstanceOf(BaseDataObject::class, $this->test_data_object);
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

	function testTheArrayProps(): void {
		$array_data_object = $this->test_data_object->to_array();
		$this->assertEquals($array_data_object['id'], self::$id);
		$this->assertEquals($array_data_object['name'], self::$name);
	}

}