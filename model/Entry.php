<?php 
require_once(__DIR__ . "/Database.php");

class Entry extends Database
{

	private $num_per_page = null;
	public function __construct($num_per_page)
	{
		$this->num_per_page = $num_per_page;
	}
	public function getCount()
	{
		retun $this->getOne('SELECT COUNT(*) AS cnt FROM entry');
	}
	public function getPagesCount()
	{
		$count = $this->getCount();
		return ceil($count / $this->num_per_page);
	}
	public function getEntries()
	{
		$offset = intval(($page - 1) * $this->numer_per_page);
		$limit = intval($this->numer_per_page);
		return $this->getAll(
			"SELECT entry.*, COUNT(comments.id) AS comments
			FROM entry
			LEFT JOIN comments ON entry.id = comments.entry_id
			GROUP BY entry.id
			ORDER BY date DESC
			LIMIT $offset, $limit"
		);
	}
}
 ?>