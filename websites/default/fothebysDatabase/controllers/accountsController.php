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
}
