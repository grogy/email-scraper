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
		$pattern  = "/[a-zA-Z0-9\._\-]+@[a-zA-Z0-9]+(\.[a-z]+)+/";
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
		$pattern  = "/(\s|\b)(http:\/\/|https:\/\/|www\.)[\.a-z0-9]+\.[a-z0-9\/\?=]+(\s|\b)/";
		preg_match_all($pattern, $str, $matches);

		$URLs = array();

		foreach ($matches[0] as $m) {
			$URLs[] = trim($m);
		}

		return $URLs;
	}
}
