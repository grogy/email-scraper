<?php

namespace Project\App;

use Project\Model\Page;

class AutomaticRobot
{
	/**
	 * @var Page
	 */
	private $pageModel;



	public function __construct(Page $pageModel)
	{
		$this->pageModel = $pageModel;
	}



	public function run()
	{
		echo "Run..\n";
	}
}
