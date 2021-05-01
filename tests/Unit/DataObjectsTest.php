<?php
use PHPUnit\Framework\TestCase;
use TwilioPlayground\DataObjects\BaseDataObject;

require_once 'vendor/autoload.php';

class BasicRouterTest extends TestCase {

	public function testBasicAssertion(): void {
		$this->assertInstanceOf(Router::class, new Router(array(
			'REQUEST_URI' => '/test/path/',
			'REQUEST_METHOD' => 'GET'
		)));
	}

}