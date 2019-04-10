<?php
namespace fothebysDatabase\controllers;
class subcategoriesController {
	private $subcategoriesTable;

	public function __construct($subcategoriesTable) {
		$this->subcategoriesTable = $subcategoriesTable;
	}
	public function subcategories($categoryNames){
		$subcategoriesTable = $this->subcategoriesTable->findAll();

		return [
			'template' => 'subcategories.php',
			'title' => 'subcategories',
			'variables' => ['subcategories' => $subcategoriesTable, 'categories' => $categoryNames]
		];
	}


	public function edit($categoryNames){
		if (isset($_POST['subcategory'])) {
			if (empty($_POST['subcategory']['sub_category_name'])){
				unset($_POST);
				header('location: editSubcategories');
			}else{
				$this->subcategoriesTable->save($_POST['subcategory']);
				header('location: subcategories');
			}
		}
		else {
			if  (isset($_GET['id_sub_categories'])) {
				$result = $this->subcategoriesTable->find('id_sub_categories ', $_GET['id_sub_categories']);
				$subcategory = $result[0];
			}
			else  {
				$subcategory = false;
			}
			return [
				'template' => 'editSubcategories.php',
				'title' => 'edit subcategory',
				'variables' => ['subcategory' => $subcategory, 'categories' => $categoryNames]
			];
		}
	}
	public function delete(){
		$this->subcategoriesTable->delete($_POST['id_sub_categories']);

		header('location: subcategories');
	}
}
