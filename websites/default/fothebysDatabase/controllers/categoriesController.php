<?php
namespace fothebysDatabase\controllers;
class categoriesController {
	private $categoriesTable;

	public function __construct($categoriesTable) {
		$this->categoriesTable = $categoriesTable;
	}
	public function categoryNames(){
		$categoriesTable = $this->categoriesTable->findAll();
		return $categoriesTable;
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
			if (empty($_POST['category']['categories_name'])){
				unset($_POST);
				header('location: editCategories');
			}else{
				$this->categoriesTable->save($_POST['category']);
				header('location: categories');
			}
		}
		else {
			if  (isset($_GET['id_categories'])) {
				//echo 'ran';
				$result = $this->categoriesTable->find('id_categories ', $_GET['id_categories']);
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
		$this->categoriesTable->delete($_POST['id_categories']);

		header('location: categories');
	}
}
