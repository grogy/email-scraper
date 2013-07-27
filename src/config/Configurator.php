<?php

namespace Project\Config;

use Project\App\AutomaticRobot;
use Project\App\Parser;
use Project\Model\Page;

class Configurator
{
	/**
	 * @var array configuration settings
	 */
	private $configuration;

	/**
	 * @var string path to file with configuration
	 */
	private $pathToConfiguration = "config.ini";



	/**
	 * @return \DibiConnection
	 */
	public function getDatabase()
	{
		return \dibi::connect($this->getDatabaseParameters());
	}



	/**
	 * @return AutomaticRobot
	 */
	public function getAppAutomaticRobot()
	{
		$this->readConfiguration();

		return new AutomaticRobot(
			$this->getModelPage(),
			$this->getParser(),
			$this->getCurl()
		);
	}



	/**
	 * @return Page
	 */
	public function getModelPage()
	{
		return new Page($this->getDatabase());
	}



	/**
	 * @return Parser
	 */
	public function getParser()
	{
		return new Parser();
	}



	/**
	 * @return \Curl
	 */
	public function getCurl()
	{
		return new \Curl();
	}



	/**
	 * @return array
	 */
	private function getDatabaseParameters()
	{
		return array(
			"driver" => "sqlite3",
			"database" => $this->configuration["database"]["path"],
		);
	}



	private function readConfiguration()
	{
		$this->configuration = parse_ini_file($this->pathToConfiguration, TRUE);
	}
}
