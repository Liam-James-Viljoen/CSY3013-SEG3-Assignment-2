<?php
namespace fothebysDatabase;
class Routes implements \databaseAccess\Routes {
  public function callControllerFunction($route) {
    require '../database.php';

      $accountsTable = new \databaseAccess\DatabaseTable($pdo, 'Admin_Acounts', 'id_admin_acounts');
      $accountsController = new \fothebysDatabase\controllers\accountsController($accountsTable);

      $categoriesTable = new \databaseAccess\DatabaseTable($pdo, 'Categories', 'id_categories');
      $categoriesController = new \fothebysDatabase\controllers\categoriesController($categoriesTable);

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


      if ($route == 'items') {

      }
      if ($route == 'editItems') {

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

      }
      if ($route == 'logout') {
        $page = $accountsController->logout();
      }


      if ($route == 'editAccount') {
        $page = $accountsController->edit();
      }
      if ($route == 'deleteAccount') {
        $page = $accountsController->delete();
      }

      return $page;
  }
}
?>
