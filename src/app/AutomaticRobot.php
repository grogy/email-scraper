<?php

namespace Project\App;

use Project\Model\IModel;
use Project\Model\Page;

class AutomaticRobot
{
	/**
	 * @var IModel
	 */
	private $model;

	/**
	 * @var Parser
	 */
	private $parser;

	/**
	 * @var \Curl
	 */
	private $curl;



	public function __construct(IModel $model, Parser $parser, \Curl $curl)
	{
		$this->model = $model;
		$this->parser = $parser;
		$this->curl = $curl;
	}



	public function run()
	{
		$pageURL = $this->model->nextPage();
		if (empty($pageURL)) {
			echo "List of web address is empty.\n";
			exit;
		}
		$pageHTML = $this->curl->get($pageURL);
		$emails = $this->parser->getEmails($pageHTML);
		$URLs = $this->parser->getURLs($pageHTML);
		$this->model->saveEmails($emails);
		$this->model->saveURLs($URLs);

		echo "Download emails is complet.\n";
	}
}
