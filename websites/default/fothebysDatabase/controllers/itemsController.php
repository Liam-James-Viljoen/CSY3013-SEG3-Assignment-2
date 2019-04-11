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





	public function edit($classifications, $categoryNames, $subcategoryNames){
		if (isset($_POST['items'])) {
			if (empty($_POST['items']['item_name'])){
				unset($_POST);
				header('location: editItems');
			}else{
				$this->itemsTable->save($_POST['items']);
				header('location: items');
			}
		}
		else {
			if  (isset($_GET['id_items'])) {
				//echo 'ran';
				$result = $this->itemsTable->find('id_items ', $_GET['id_items']);
				$items = $result[0];
			}
			else  {
				$items= false;
			}
			return [
				'template' => 'editItems.php',
				'title' => 'edit items',
				'variables' => ['items' => $items, 'classifications' => $classifications, 'categories' => $categoryNames, 'subcategories' => $subcategoryNames]
			];
		}
	}
	public function delete(){
		$this->categoriesTable->delete($_POST['id_items']);

		header('location: items');
	}
}
