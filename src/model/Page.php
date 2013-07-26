<?php

namespace Project\Model;

class Page extends BaseModel implements IModel
{
	/**
	 * Get next address for scanning
	 */
	public function nextPage()
	{
		return NULL;
	}



	/**
	 * Save emails
	 * @param array $emails
	 */
	public function saveEmails(array $emails)
	{

	}



	/**
	 * Save URLs
	 * @param array $URLs
	 */
	public function saveURLs(array $URLs)
	{

	}
}
