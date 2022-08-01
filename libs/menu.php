<?php
/**
 *
 */
class Menu{
  // Variables de la tabla "cat_menu"
  private $idMenu;
  private $nombreMenu;
  private $descripcionMenu;
  private $referenciaMenu;
  private $iconoMenu;
  private $posicionMenu;
  private $estatusMenu;

  //Variables de la tabla "cat_submenu"
  private $idSubmenu;
  private $fkMenu;
  private $nombreSubmenu;
  private $descripcionSubmenu;
  private $referenciaSubmenu;
  private $estatusSubmenu;

  function __construct(){
  }

  public function getMenu($id_rol,$puesto){
    $con = new Database();
    try {
      $query = $con->connect()->prepare("
        select cm.* from asignacion_menu am
        inner join cat_menu cm
        on cm.id_menu = am.fk_id_menu
        where am.fk_id_rol_usuario in (:idRol,4)
        and cm.fk_id_puesto in (:idPuesto,8)
        and cm.estatus_menu in (1)
        ORDER BY cm.posicion_menu ASC
      ");
      $query->execute(['idRol'=>$id_rol,'idPuesto'=>$puesto]);
      $items = $query->fetchAll();
      return $items;
    } catch (PDOException $e) {
      echo "error: " . $e->getMessage();
      return [];
    }
  }

  public function getMenuLogin(){
    $con = new Database();
    try {
      $query = $con->connect()->query("SELECT * FROM cat_menu WHERE nombre_menu IN('Iniciar sesión','Registrarme')");
      $items = $query->fetchAll();
      return $items;
    } catch (PDOException $e) {
      echo "error: " . $e->getMessage();
      return [];
    }
  }

  public function getByIdMenuSubmenu($id,$puesto){
    $con = new Database();
    try {
      $query = $con->connect()->prepare("
        SELECT * FROM cat_submenu 
        WHERE fk_id_menu = :fkMenu 
        and fk_id_puesto in (:fkPuesto,8)
        and estatus_submenu in (1)
        ORDER BY nombre_submenu ASC;
      ");
      $query->execute(['fkMenu'=>$id, 'fkPuesto'=>$puesto]);
      return $query->fetchAll();
    } catch (PDOException $e) {
      echo "error: " . $e->getMessage();
      return false;
    }
  }
  //
  // public function getSubMenu($id){
  //   try {
  //     $query = $this->db->connect()->prepare("SELECT * FROM submenu WHERE matricula = :matricula");
  //     $query->execute(['matricula'=>$id]);
  //     while ($row=$query->fetch()) {
  //       $item->matricula = $row['matricula'];
  //       $item->nombre = $row['nombre'];
  //       $item->apellido = $row['apellido'];
  //     }
  //   } catch (PDOException $e) {
  //
  //   }
  //
  // }

}

 ?>
