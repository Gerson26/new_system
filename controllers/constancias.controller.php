<?php
include 'models/validaracceso.model.php';
class Constancias extends ControllerBase
{
    function __construct()
    {
        parent::__construct();
    }
    public function validaraccesomenu($id_menu){
        $validar = new ValidarModel();
        $resp = $validar->getMenuValidar($_SESSION['fk_rol_usuario-'.constant('Sistema')],$_SESSION['fk_puesto-'.constant('Sistema')],$id_menu);
        return $resp;
    }
    public function validaraccesosubmenu($id_menu,$referencia){
        $validar = new ValidarModel();
        $resp = $validar->getSubmenuValidar($id_menu,$_SESSION['fk_puesto-'.constant('Sistema')],$referencia);
        return $resp;
    }
    function render(){//Menu
        if($this->validaraccesomenu(21)){
            $this->view->render("constancias/index");
        }else {
            header("location:" . constant('URL') . "Errores");
        }
    }
}

?>