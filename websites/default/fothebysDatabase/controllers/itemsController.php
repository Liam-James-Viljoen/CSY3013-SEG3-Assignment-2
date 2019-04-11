<?php
namespace fothebysDatabase\controllers;
class itemsController {
	private $itemsTable;

	public function __construct($itemsTable) {
		$this->itemsTable = $itemsTable;
	}

	public function items(){
		$itemsTable = $this->itemsTable->findAll();

		return [
			'template' => 'items.php',
			'title' => 'items',
			'variables' => ['items' => $itemsTable]
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
