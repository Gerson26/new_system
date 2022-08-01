<?php
include 'models/validaracceso.model.php';
class Modificar extends ControllerBase
{
    function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['id_usuario-' . constant('Sistema')]) && empty($_SESSION['id_usuario-' . constant('Sistema')])) {
                header("location:" . constant('URL') . "Errores");
        }
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
    function sociedad(){//Submenu
        if($this->validaraccesomenu(5)){
            if ($this->validaraccesosubmenu(5,'modificar/sociedad')) {
                $this->view->render("modificar/sociedad");
            }else {
                header("location:" . constant('URL') . "Errores");
            }
        }else {
            header("location:" . constant('URL') . "Errores");
        }
    }
    function perfil(){//Submenu
        if($this->validaraccesomenu(5)){
            if ($this->validaraccesosubmenu(5,'modificar/perfil')) {
                $this->view->render("modificar/perfil");
            }else {
                header("location:" . constant('URL') . "Errores");
            }
        }else {
            header("location:" . constant('URL') . "Errores");
        }
    }
    function socios(){//Submenu
        if($this->validaraccesomenu(5)){
            if ($this->validaraccesosubmenu(5,'modificar/socios')) {
                $this->view->render("modificar/socios");
            }else {
                header("location:" . constant('URL') . "Errores");
            }
        }else {
            header("location:" . constant('URL') . "Errores");
        }
    }
    function categorias(){//Submenu
        if($this->validaraccesomenu(5)){
            if ($this->validaraccesosubmenu(5,'modificar/categorias')) {
                $this->view->render("modificar/categorias");
            }else {
                header("location:" . constant('URL') . "Errores");
            }
        }else {
            header("location:" . constant('URL') . "Errores");
        }
    }
    function datosfiscales(){//Submenu
        if($this->validaraccesomenu(5)){
            if ($this->validaraccesosubmenu(5,'modificar/datosfiscales')) {
                $this->view->render("modificar/datosfiscales");
            }else {
                header("location:" . constant('URL') . "Errores");
            }
        }else {
            header("location:" . constant('URL') . "Errores");
        }
    }
    function consultorios(){//Submenu
        if($this->validaraccesomenu(5)){
            if ($this->validaraccesosubmenu(5,'modificar/consultorios')) {
                $this->view->render("modificar/consultorios");
            }else {
                header("location:" . constant('URL') . "Errores");
            }
        }else {
            header("location:" . constant('URL') . "Errores");
        }
    }
    function documentos(){//Submenu
        if($this->validaraccesomenu(5)){
            if ($this->validaraccesosubmenu(5,'modificar/documentos')) {
                $this->view->render("modificar/documentos");
            }else {
                header("location:" . constant('URL') . "Errores");
            }
        }else {
            header("location:" . constant('URL') . "Errores");
        }
    }
}

?>