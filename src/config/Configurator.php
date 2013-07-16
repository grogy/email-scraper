<?php

namespace Project\Config;

use Project\App\AutomaticRobot;
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
		return new AutomaticRobot($this->getModelPage());
	}



	public function getModelPage()
	{
		return new Page($this->getDatabase());
	}



	/**
	 * @return array
	 */
	private function getDatabaseParameters()
	{
		return array(
			"driver" => "sqlite3",
			"database" => SRC_DIR . "/../db/db.sqlite",
		);
	}
}
