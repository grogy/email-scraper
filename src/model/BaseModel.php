<?php

namespace Project\Model;

class BaseModel
{
	/**
	 * @var \DibiConnection
	 */
	protected $db;



	public function __construct(\DibiConnection $db)
	{
		$this->db = $db;
	}
}
