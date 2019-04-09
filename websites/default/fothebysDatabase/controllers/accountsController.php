<?php
namespace fothebysDatabase\controllers;
class accountsController {
	private $accountsTable;

	public function __construct($accountsTable) {
		$this->accountsTable = $accountsTable;
	}
	public function login(){
		//$accountsTable = $this->accountsTable->findAll(); //Unnecasery
		return [
  		'template' => 'login.php',
  		'title' => 'admin accounts',
  		'variables' => []
  	];
	}
	public function loginCheck($username){
		$accountsTable = $this->accountsTable->find('username', $username);
		return [
			'template' => 'login.php',
			'title' => 'admin accounts',
			'variables' => ['user' => $accountsTable]
		];
	}
	public function logout(){
		$accountsTable = $this->accountsTable->findAll();
		return [
			'template' => 'logout.html.php',
			'title' => 'admin accounts',
			'variables' => []
		];
	}
	public function userControls(){
		$accountsTable = $this->accountsTable->findAll();
		return [
			'template' => 'accounts.php',
			'title' => 'admin accounts',
			'variables' => ['user' => $accountsTable]
		];
	}
}
