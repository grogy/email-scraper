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
			SELECT id, url
			FROM pages
			WHERE last_scan = ''
			LIMIT 1";
		$page = $this->db->query($query)->fetch();

		$queryUpdate = "
			UPDATE pages
			SET last_scan = ''
			WHERE id = %i";
		$this->db->query($queryUpdate, $page["id"]);

		return $page["url"];
	}



	/**
	 * Save emails
	 * @param array $emails
	 */
	public function saveEmails(array $emails)
	{
		foreach ($emails as $email) {
			$arr = array(
				"address" => $email
			);
			$this->db->insert("emails", $arr)->execute();
		}
	}



	/**
	 * Save URLs
	 * @param array $URLs
	 */
	public function saveURLs(array $URLs)
	{
		foreach ($URLs as $url) {
			$arr = array(
				"url" => $url
			);
			$this->db->insert("pages", $arr)->execute();
		}
	}
}
