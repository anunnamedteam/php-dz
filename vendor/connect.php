<?php

class Database {

	private $link;

	public function __construct(){
		$this->connect();
	}

	public function connect(){
		$dsn = 'mysql:host='.'localhost'.';dbname='.'dz'.';charset ='.$config['charset'].'';
		$this->link = new PDO($dsn, 'mysql', 'mysql');
	}

	public function execute($sql){
		$sth = $this->link->prepare($sql);
		return $sth->execute();
	}

	public function query($sql){
		$sth = $this->link->prepare($sql);
		$sth->execute();

		$result = $sth->fetchALL(PDO::FETCH_ASSOC);
		if($result === false)
			return [];
		return $result;
	}
}


?>