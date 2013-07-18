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

	/**
	 * @var \Curl
	 */
	private $curl;



	public function __construct(Page $pageModel, Parser $parser, \Curl $curl)
	{
		$this->pageModel = $pageModel;
		$this->parser = $parser;
		$this->curl = $curl;
	}



	public function run()
	{
		$pageURL = $this->pageModel->nextPage();
		$pageHTML = $this->curl->get($pageURL);
		$emails = $this->parser->getEmails($pageHTML);
		$URLs = $this->parser->getURLs($pageHTML);
		$this->pageModel->saveEmails($emails);
		$this->pageModel->saveURLs($URLs);

		echo "Download emails is complet.\n";
	}
}
