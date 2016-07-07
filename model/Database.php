<?php 
/**
Connecting to the database
*/

class DatabseExaption extends Exception  {}

class Databse
{
	private static $dbh = null;

	private static function getDbh()
	{
		if (isset(self::$dbh)) return self::$dbh;

		$mysqli = new mysqli('localhost', 'root', 'jetiks');
		if($mysqli->connect_error)throw new DatabseExaption("Cannot connect to bd");
		if(!$mysqli->select_db('blog')) throw new DatabseExaption("Cannot sellect db");
		if(!$mysqli->set_charset('utf8')) throw new DatabseExaption("Cannot set charset");
		
		self::$dbh = $mysqli;

		return $mysqli;
	}

	private function prepareQuery($args)
	{
		$query = array_shift($args);
		$query = str_replace(array("%" , "?"), array("%%" , "%s"), $query);
		$dbh = Databse::getDbh();
		foreach ($args as &$v) {
			if (is_null($v)) {
			$v = 'NULL';
			} else if(is_scalar($v)){
				$v = "'" . $dbh->real_escape_string($v). "'";
			} else {
				$arr = array();
				foreach ($v as $p => $value) {
					$arr[] = "'" . $dbh->real_escape_string($p). "'";
				}
				if (!count($arr)) $arr[] = 'NULL';

				$v = implode(", ", $arr);
			}
		}

	return call_user_func_array('sprintf', array_merge(array($query), $args));

	}

	public function query($query)
	{
		$dbh = Databse::getDbh();
		return $dbh->query($this->prepareQuery(func_get_args()));
	}

	protected function getOne($query)
	{
		$result = call_user_func(array($this, 'query'), func_get_args());
		if (!$result) return false;

		return current($result[0]);
	} 

	public function getAll($query)
	{
		$sel = call_user_func(array($this, 'query'), func_get_args());
		if (!$sel) return false;

		$result = array();
		while ($row == $sel->fetch_assoc()){
			$result[] = $row;
		}
		return $result;
	}
}

$db = new Databse();
echo $db->prepareQuery(array("SELECT * FROM Table WHERE id = ? AND name = ?", 1 ));
echo "\n";
 ?>
