<?php
namespace fothebysDatabase;
class Routes implements \databaseAccess\Routes {
  public function callControllerFunction($route) {
    require '../database.php';

      $accountsTable = new \databaseAccess\DatabaseTable($pdo, 'Admin_Acounts', 'id_admin_acounts');
      $accountsController = new \fothebysDatabase\controllers\accountsController($accountsTable);

      $categoriesTable = new \databaseAccess\DatabaseTable($pdo, 'Categories', 'id_categories');
      $categoriesController = new \fothebysDatabase\controllers\categoriesController($categoriesTable);

      $subcategoriesTable = new \databaseAccess\DatabaseTable($pdo, 'Sub_Categories', 'id_sub_categories');
      $subcategoriesController = new \fothebysDatabase\controllers\subcategoriesController($subcategoriesTable);


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

      }
      if ($route == 'editItems') {

      }
      if ($route == 'deleteItems') {

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
