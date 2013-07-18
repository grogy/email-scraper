<?php

use Tester\Assert;

require_once __DIR__ . '/bootstrap.php';

/**
 * Testing helper - \Project\App\Parser
 */
class ParserTest extends Tester\TestCase
{
	/**
	 * @var \Project\App\Parser
	 */
	private $parser;



	public function setUp()
	{
		$this->parser = new \Project\App\Parser();
	}



	public function testOK()
	{
		Assert::false(false);
	}
}

$test = new ParserTest();
$test->run();
