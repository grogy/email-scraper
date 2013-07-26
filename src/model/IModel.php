<?php

namespace Project\Model;

interface IModel
{
	/**
	 * Get next address for scanning
	 */
	public function nextPage();



	/**
	 * Save emails
	 * @param array $emails
	 */
	public function saveEmails(array $emails);



	/**
	 * Save URLs
	 * @param array $URLs
	 */
	public function saveURLs(array $URLs);
}
