<?php
/**
 *
 */
require_once("libs/encrypt_decrypt.php");
class Login extends ControllerBase{

  function __construct(){
    parent::__construct();
    $this->view->alertLogin = "";
    $this->view->usuarios = [];
  }
  function render(){
    $this->view->render('login/index');
  }
  function registro(){
    $this->view->render('login/registro');
  }
  function registrar(){
    $data = array();
    try {
      if ($this->model->registrar($_POST)) {
        //echo "Se registro correctamente, bienvenido/a";
        $this->data = [
          'estatus' => 'success',
          'titulo' => 'Registro exitoso',
          'respuesta' => 'Se registro correctamente la información, bienvenido/a.'
        ];
      }else{
        //echo "El correo ingresado ya se encuentra registrado";
        $data = [
          'estatus' => 'warning',
          'titulo' => 'Correo registrado',
          'respuesta' => 'El correo ingresado ya se encuentra registrado, intente con otro correo.'
        ];
      }
    } catch (\Throwable $th) {
      $data = [
        'estatus' => 'error',
        'titulo' => 'Error de servidor',
        'respuesta' => 'Ups!, ocurrió un problema con la petición, si persiste el error favor de comunicarse con el área de sistemas...'
      ];
    }
    echo json_encode($data);
  }
  function acceso(){
    if (!isset($_POST['usernameLahe']) || !isset($_POST['passwordLahe'])) {
      header("location:".constant('URL')."login");
    }else {
      $user = $_POST['usernameLahe'];$pass =encrypt_decrypt('encrypt', $_POST['passwordLahe']);
      if (!empty($user) && !empty($pass)) {
        $usuario = $this->model->getFindByUsuario($user);
        if ($usuario->resp) {
          // echo "Existe usuario";
          if ($usuario->password_usuario == $pass) {
            // echo "Contraseña correcta";
            if ($usuario->estatus_usuario == 1) {
              // $_SESSION['idUsuario-'.constant('Sistema')] = 1;
              $_SESSION['id_usuario-'.constant('Sistema')] = $usuario->id_usuario;
              $_SESSION['nombre_usuario-'.constant('Sistema')] = $usuario->nombre_usuario;
              $_SESSION['nickname_usuario-'.constant('Sistema')] = $usuario->nickname_usuario;
              $_SESSION['password_usuario-'.constant('Sistema')] = $usuario->password_usuario;
              $_SESSION['fk_puesto-'.constant('Sistema')] = $usuario->fk_puesto;
              $_SESSION['fk_rol_usuario-'.constant('Sistema')] = $usuario->fk_rol_usuario;
              $_SESSION['estatus_usuario-'.constant('Sistema')] = $usuario->estatus_usuario;
              // // echo "Usuario y constraseña recibidos";
              $this->model->insertSesion();
              header("location:".constant('URL'));
            }else {
              $mensaje = '<br><div id="alertaLogin" class="alert alert-warning text-center h5" role="alert">Su cuenta se encuentra inactiva!</div>';
              $this->view->alertLogin = $mensaje;
              $this->render();
            }
          }else {
            $mensaje = '<br><div id="alertaLogin" class="alert alert-danger text-center h5" role="alert">Contraseña incorrecta!</div>';
            $this->view->alertLogin = $mensaje;
            $this->render();
          }
        }else {
          $mensaje = '<br><div id="alertaLogin" class="alert alert-danger text-center h5" role="alert">El usuario ingresado no existe!</div>';
          $this->view->alertLogin = $mensaje;
          $this->render();
        }

      }else {
        $mensaje = '<br><div id="alertaLogin" class="alert alert-danger text-center h5" role="alert">Falta capturar usuario o contaseña!</div>';
        $this->view->alertLogin = $mensaje;
        $this->render();
      }
    }
  }
  function salir(){
    unset($_SESSION['id_usuario-'.constant('Sistema')]);
    unset($_SESSION['nombre_usuario-'.constant('Sistema')]);
    unset($_SESSION['nickname_usuario-'.constant('Sistema')]);
    unset($_SESSION['password_usuario-'.constant('Sistema')]);
    unset($_SESSION['fk_puesto-'.constant('Sistema')]);
    unset($_SESSION['fk_rol_usuario-'.constant('Sistema')]);
    unset($_SESSION['estatus_usuario-'.constant('Sistema')]);
    // session_destroy();
    header("location:".constant('URL'));
  }
}

 ?>
