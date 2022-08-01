<?php
class Catalogos extends ControllerBase
{
    function __construct()
    {
        parent::__construct();
    }
    function catalogoEstados(){
        $data = $this->model->catalogoEstados();
        echo json_encode($data);
        return 0;
      }
      function catalogoMunicipios($param = null){
        $data = $this->model->catalogoMunicipios($param[0]);
        echo json_encode($data);
        return 0;
      }
      function catalogoColonias($param = null){
        $data = $this->model->catalogoColonias($param[0]);
        echo json_encode($data);
        return 0;
      }
      function catalogoCategorias(){
        $data = $this->model->catalogoCategorias();
        echo json_encode($data);
        return 0;
      }
      public function catalogoPrefijos(){
        $data = $this->model->catalogoPrefijos();
        echo json_encode($data);
        return 0;
      }
      public function catalogoLadas(){
        $data = $this->model->catalogoLadas();
        echo json_encode($data);
      }
}

?>