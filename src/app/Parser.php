<?php

namespace Project\App;

class Parser
{
	/**
	 * Get all mails from string
	 * @param string $str
	 * @return array
	 */
	public function getEmails($str)
	{
		$pattern  = "/[a-zA-Z0-9\.]+@[a-zA-Z0-9]+\.[a-z]+/";
		preg_match_all($pattern, $str, $matches);

		$emails = array();

		foreach ($matches[0] as $m) {
			$emails[] = $m;
		}

		return $emails;
	}



	/**
	 * Get all URL from string
	 * @param string $str
	 * @return array
	 */
	public function getURLs($str)
	{
		return array();
	}
}
