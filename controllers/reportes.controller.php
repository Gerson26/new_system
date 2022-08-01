<?php
include 'models/validaracceso.model.php';
class Reportes extends ControllerBase
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
    function por_cajero(){//Submenu
        if($this->validaraccesomenu(26)){
            if ($this->validaraccesosubmenu(26,'reportes/por_cajero')) {
                $this->view->render("reportes/por_cajero");
            }else {
                header("location:" . constant('URL') . "Errores");
            }
        }else {
            header("location:" . constant('URL') . "Errores");
        }
    }
    function por_dia(){//Submenu
        if($this->validaraccesomenu(26)){
            if ($this->validaraccesosubmenu(26,'reportes/por_cajero')) {
                $this->view->render("reportes/por_dia");
            }else {
                header("location:" . constant('URL') . "Errores");
            }
        }else {
            header("location:" . constant('URL') . "Errores");
        }
    }
}

?>