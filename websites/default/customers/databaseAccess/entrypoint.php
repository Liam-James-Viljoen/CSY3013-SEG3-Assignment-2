<?php
namespace databaseAccess;
class EntryPoint {
  private $routes;

  public function __construct(\databaseAccess\Routes $routes){
    $this->routes=$routes;
  }
  public function run(){
    $route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
    $page = $this->routes->callControllerFunction($route);
    $output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
    $title = $page['title'];
    require  '../templates/layout.html.php';
  }
  function loadTemplate($fileName, $templateVars) {

    if ($templateVars != null){
      extract($templateVars);
    }

  	ob_start();
  	require $fileName;
  	$contents = ob_get_clean();
  	return $contents;
  }
}
?>
