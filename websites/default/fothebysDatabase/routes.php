<?php
namespace fothebysDatabase;
class Routes implements \databaseAccess\Routes {
  public function callControllerFunction($route) {
    require '../database.php';

      $accountsTable = new \databaseAccess\DatabaseTable($pdo, 'Admin_Acounts', 'id_admin_accounts');
      $accountsController = new \fothebysDatabase\controllers\accountsController($accountsTable);

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
      if ($route == 'categories') {

      }
      if ($route == 'subcategories') {

      }
      if ($route == 'logout') {
        $page = $accountsController->logout();
      }
      return $page;
  }
}
?>
