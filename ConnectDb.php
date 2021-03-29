<?php

class ConnectDb {

    public $_db;

	public function __construct(PDO $dbh)
	{
		$this->_db = $dbh;
	}

}