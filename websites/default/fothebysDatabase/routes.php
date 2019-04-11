<?php
namespace fothebysDatabase;
class Routes implements \databaseAccess\Routes {
  public function callControllerFunction($route) {
    require '../database.php';

      $accountsTable = new \databaseAccess\DatabaseTable($pdo, 'Admin_Acounts', 'id_admin_acounts');
      $accountsController = new \fothebysDatabase\controllers\accountsController($accountsTable);

      $itemsTable = new \databaseAccess\DatabaseTable($pdo, 'Items', 'id_items');
      $itemsController = new \fothebysDatabase\controllers\itemsController($itemsTable);

      $classificationTable = new \databaseAccess\DatabaseTable($pdo, 'Classifications', 'id_classifications');
      $classificationController = new \fothebysDatabase\controllers\classificationsController($classificationTable);

      $categoriesTable = new \databaseAccess\DatabaseTable($pdo, 'Categories', 'id_categories');
      $categoriesController = new \fothebysDatabase\controllers\categoriesController($categoriesTable);

      $subcategoriesTable = new \databaseAccess\DatabaseTable($pdo, 'Sub_Categories', 'id_sub_categories');
      $subcategoriesController = new \fothebysDatabase\controllers\subcategoriesController($subcategoriesTable);

      $auctionsTable = new \databaseAccess\DatabaseTable($pdo, 'Auctions', 'id_auctions');
      $auctionsController = new \fothebysDatabase\controllers\auctionsController($auctionsTable);


      if ($route == '' || $route == 'login') {
          if (isset($_POST['submit'])) {
            $page = $accountsController->loginCheck(($_POST['username']));
          }else {
            $page = $accountsController->login();
          }
      }
      if ($route == 'users') {
        $page = $accountsController->userControls();
      }
      if ($route == 'editAccount') {
        $page = $accountsController->edit();
      }
      if ($route == 'deleteAccount') {
        $page = $accountsController->delete();
      }


      if ($route == 'items') {
        $page = $itemsController->items();
      }
      if ($route == 'editItems') {
        $classifications = $classificationController->returnClassifications();
        $categoryNames = $categoriesController->categoryNames();
        $subcategoryNames = $subcategoriesController->returnSubCategories();
        $page = $itemsController->edit($classifications, $categoryNames, $subcategoryNames);
      }
      if ($route == 'deleteItems') {
        $page = $itemsController->delete();
      }


      if ($route == 'classification') {
        $page = $classificationController->classification();
      }
      if ($route == 'editClassification') {
        $page = $classificationController->edit();
      }
      if ($route == 'deleteClassification') {
        $page = $classificationController->delete();
      }


      if ($route == 'auctions') {
        $page = $auctionsController->auctions();
      }
      if ($route == 'editAuction') {
        $page = $auctionsController->edit();
      }
      if ($route == 'deleteAuction') {
        $page = $auctionsController->delete();
      }


      if ($route == 'categories') {
        $page = $categoriesController->categories();
      }
      if ($route == 'editCategories') {
        $page = $categoriesController->edit();
      }
      if ($route == 'deleteCategories') {
        $page = $categoriesController->delete();
      }


      if ($route == 'subcategories') {
        $categoryNames = $categoriesController->categoryNames();
        $page = $subcategoriesController->subcategories($categoryNames);
      }
      if ($route == 'editSubcategories') {
        $categoryNames = $categoriesController->categoryNames();
        $page = $subcategoriesController->edit($categoryNames);
      }
      if ($route == 'deleteSubcategories') {
        //$page = $subcategoriesController->delete();
      }


      if ($route == 'logout') {
        $page = $accountsController->logout();
      }


      return $page;
  }
}
?>
