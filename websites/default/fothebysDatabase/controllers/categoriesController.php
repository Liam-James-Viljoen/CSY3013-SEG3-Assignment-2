<?php
namespace fothebysDatabase\controllers;
class categoriesController {
	private $categoriesTable;

	public function __construct($categoriesTable) {
		$this->categoriesTable = $categoriesTable;
	}
	public function categories(){
		$categoriesTable = $this->categoriesTable->findAll();

		return [
			'template' => 'categories.php',
			'title' => 'categories',
			'variables' => ['categories' => $categoriesTable]
		];
	}
	public function edit(){
		if (isset($_POST['category'])) {
			if (empty($_POST['category']['name'])){
				unset($_POST);
				header('location: editCategories');
			}else{
				$this->categoriesTable->save($_POST['category']);
				header('location: categories');
			}
		}
		else {
			if  (isset($_GET['id'])) {
				//echo 'ran';
				$result = $this->categoriesTable->find('id', $_GET['id_categories']);
				$category = $result[0];
			}
			else  {
				$category = false;
			}
			return [
				'template' => 'editCategories.php',
				'title' => 'edit category',
				'variables' => ['category' => $category]
			];
		}
	}
	public function delete(){
		$this->categoriesTable->delete($_POST['id']);

		header('location: categories');
	}
}
