<?php
namespace OCFram;

class PDOFactory
{
	public static function getMysqlConnexion()
	{
		$db = new \PDO('mysql:host=db674589132.db.1and1.com;dbname=db674589132;charset=utf8',  'dbo674589132', '92a22f2.A');
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		return $db;
	}
}