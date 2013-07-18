<?php

namespace Project\App;

use Project\Model\Page;

class AutomaticRobot
{
	/**
	 * @var Page
	 */
	private $pageModel;

	/**
	 * @var Parser
	 */
	private $parser;



	public function __construct(Page $pageModel, Parser $parser)
	{
		$this->pageModel = $pageModel;
		$this->parser = $parser;
	}



	public function run()
	{
		$pageURL = $this->pageModel->nextPage();
		$pageHTML = "";// $this->getHtmlContent($pageURL);
		$emails = $this->parser->getEmails($pageHTML);
		$this->pageModel->saveEmails($emails);

		echo "Download emails is complet.\n";
	}
}
