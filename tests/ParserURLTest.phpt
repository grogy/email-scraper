<?php

use Tester\Assert;

require_once __DIR__ . '/bootstrap.php';

/**
 * Testing helper for parse URLs from HTML
 */
class ParserURLTest extends Tester\TestCase
{
	/**
	 * @var \Project\App\Parser
	 */
	private $parser;



	public function setUp()
	{
		$this->parser = new \Project\App\Parser();
	}



	public function testBase()
	{
		$expected = array("www.domain.com");
		$actual = $this->parser->getURLs("www.domain.com");
		Assert::same($expected, $actual);
	}



	public function testHttp()
	{
		$expected = array("http://www.domain.com");
		$actual = $this->parser->getURLs("http://www.domain.com");
		Assert::same($expected, $actual);
	}



	public function testHttps()
	{
		$expected = array("https://www.domain.com");
		$actual = $this->parser->getURLs("https://www.domain.com");
		Assert::same($expected, $actual);
	}
}

$test = new ParserURLTest();
$test->run();
