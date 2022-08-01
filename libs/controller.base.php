<?php
/**
 *
 */
class ControllerBase{

  function __construct(){
    // echo "<p>Controlador base</p>";
    $this->view = new ViewBase();
    $this->view->icono= "<link rel='shortcut icon' href='".constant('URL').constant("ICONO")."'>";
    $this->view->logotipo = constant('LOGOTIPO');
    $this->view->sociedad = constant('SOCIEDAD');
    $this->view->nombresistema = constant('NOMBRESISTEMA');
    $this->view->descripcionsistema = constant('DESCRIPCIONSISTEMA');
    $this->view->correosoporte = constant('CORREOSOPORTE');
  }

  function loadModel($model){
    $url = "models/".$model.".model.php";

    if (file_exists($url)) {
      require $url;

      $modelName = $model."Model";
      $this->model = new $modelName;
    }
  }
}

 ?>
