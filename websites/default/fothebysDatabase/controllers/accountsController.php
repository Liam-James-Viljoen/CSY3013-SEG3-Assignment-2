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

	public function edit(){
		if (isset($_POST['user'])) {
				if (empty($_POST['user']['username']) || empty($_POST['user']['password'])){
					unset($_POST);
					header('location: editAccounts');
				}else{
					$_POST['user']['password']=password_hash($_POST['user']['password'], PASSWORD_DEFAULT);
					$this->accountsTable->save($_POST['user']);
					header('location:users');
				}
		}
		else {
			if  (isset($_GET['id_admin_acounts'])) {
				$result = $this->accountsTable->find('id_admin_acounts', $_GET['id_admin_acounts']);
				$user = $result[0];
			}
			else  {
				$user = false;
			}
			$_SESSION['error']['blank'] = '';
			return [
				'template' => 'editAccounts.php',
				'title' => 'edit account',
				'variables' => ['user' => $user]
			];
		}
	}
	public function delete(){
		$this->accountsTable->delete($_POST['id_admin_acounts']);

		header('location:users');
	}
}
