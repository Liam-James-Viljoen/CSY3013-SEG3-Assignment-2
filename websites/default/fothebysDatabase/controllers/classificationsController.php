<?php
namespace fothebysDatabase\controllers;
class classificationsController {
	private $classificationsTable;

	public function __construct($classificationsTable) {
		$this->classificationsTable = $classificationsTable;
	}

	public function classification(){
		$classificationsTable = $this->classificationsTable->findAll();

		return [
			'template' => 'classification.php',
			'title' => 'classifications',
			'variables' => ['classifications' => $classificationsTable]
		];
	}
	public function edit(){
		if (isset($_POST['classifications'])) {
			if (empty($_POST['classifications']['classification_name'])){
				unset($_POST);
				header('location: editClassification');
			}else{
				$this->classificationsTable->save($_POST['classifications']);
				header('location: classification');
			}
		}
		else {
			if  (isset($_GET['id_auctions'])) {
				$result = $this->classificationsTable->find('id_classifications ', $_GET['id_classifications']);
				$classifications = $result[0];
			}
			else  {
				$classifications = false;
			}
			return [
				'template' => 'editClassification.php',
				'title' => 'edit Auctions',
				'variables' => ['classifications' => $classifications]
			];
		}
	}
	public function delete(){
		$this->classificationsTable->delete($_POST['id_classifications']);

		header('location: classification');
	}
}
