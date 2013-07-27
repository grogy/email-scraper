<?php

use Tester\Assert;

require_once __DIR__ . '/bootstrap.php';

/**
 * Testing helper for parse emails from HTML
 */
class ParserEmailTest extends Tester\TestCase
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
		$expected = array("name@domain.com");
		$actual = $this->parser->getEmails("name@domain.com");
		Assert::same($expected, $actual);
	}



	public function testDash()
	{
		$expected = array("one-two@domain.com");
		$actual = $this->parser->getEmails("one-two@domain.com");
		Assert::same($expected, $actual);
	}



	public function testTwoDotInDomain()
	{
		$expected = array("name@domain.com.com");
		$actual = $this->parser->getEmails("name@domain.com.com");
		Assert::same($expected, $actual);

		$expected = array("name@domain.com2.com");
		$actual = $this->parser->getEmails("name@domain.com2.com");
		Assert::same($expected, $actual);
	}



	public function testInText()
	{
		$expected = array(
			"name@domain.com",
			"name2@domain2.net"
		);
		$actual = $this->parser->getEmails("Text and text.. name@domain.com and email: name2@domain2.net");
		Assert::same($expected, $actual);
	}



	public function testDot()
	{
		$expected = array("name.dot@domain.com");
		$actual = $this->parser->getEmails("name.dot@domain.com");
		Assert::same($expected, $actual);
	}



	public function testUnderline()
	{
		$expected = array("one_two@domain.com");
		$actual = $this->parser->getEmails("one_two@domain.com");
		Assert::same($expected, $actual);
	}
}

$test = new ParserEmailTest();
$test->run();
