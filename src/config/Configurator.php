<?php

namespace Project\Config;

use Project\App\AutomaticRobot;
use Project\App\Parser;
use Project\Model\Page;

class Configurator
{
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
			"database" => SRC_DIR . "/../../emails.sqlite",
		);
	}
}
