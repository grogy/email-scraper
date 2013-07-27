<?php

namespace Project\Model;

class Page extends BaseModel implements IModel
{
	/**
	 * Get next address for scanning
	 */
	public function nextPage()
	{
		$query = "
			SELECT url
			FROM pages
			WHERE last_scan = ''
			LIMIT 1";
		$page = $this->db->query($query)->fetchSingle();

		$queryUpdate = "
			UPDATE pages
			SET last_scan = 1
			WHERE url = %s";
		$this->db->query($queryUpdate, $page);

		return $page;
	}



	/**
	 * Save emails
	 * @param array $emails
	 */
	public function saveEmails(array $emails)
	{
		$query = "
			INSERT OR IGNORE INTO emails (address)
			VALUES (%s)";

		foreach ($emails as $email) {
			$this->db->query($query, $email);
		}
	}



	/**
	 * Save URLs
	 * @param array $URLs
	 */
	public function saveURLs(array $URLs)
	{
		$query = "
			INSERT OR IGNORE INTO pages (url, last_scan)
			VALUES (%s, '')";

		foreach ($URLs as $URL) {
			$this->db->query($query, $URL);
		}
	}
}
