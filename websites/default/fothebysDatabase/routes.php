<?php
namespace fothebysDatabase;
class Routes implements \databaseAccess\Routes {
  public function callControllerFunction($route) {
    require '../database.php';

      $accountsTable = new \databaseAccess\DatabaseTable($pdo, 'Admin_Acounts', 'id');
      $accountsController = new \fothebysDatabase\controllers\accountsController($accountsTable);

      if ($route == '') {
          $page = $accountsController->login();
      }
      return $page;
  }
}
?>
