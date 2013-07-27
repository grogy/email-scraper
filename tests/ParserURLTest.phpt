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



	public function testAddressWithGetParameter()
	{
		$expected = array("http://www.domain.com?param=12");
		$actual = $this->parser->getURLs("http://www.domain.com?param=12");
		Assert::same($expected, $actual);
	}



	public function testLongAddress()
	{
		$expected = array("http://www.domain.com/str/str2/str3");
		$actual = $this->parser->getURLs("http://www.domain.com/str/str2/str3");
		Assert::same($expected, $actual);
	}



	public function testLongAddressWithParameter()
	{
		$expected = array("http://www.domain.com/str/str2/str3?search=str");
		$actual = $this->parser->getURLs("http://www.domain.com/str/str2/str3?search=str");
		Assert::same($expected, $actual);
	}



	public function testSearchInHTML()
	{
		$expected = array(
			"http://www.domain.com",
			"http://www.domain2.com",
		);
		$htmlForSearch = file_get_contents(__DIR__ . "/input/ParseUrlTest.html");
		$actual = $this->parser->getURLs($htmlForSearch);
		Assert::same($expected, $actual);
	}
}

$test = new ParserURLTest();
$test->run();
