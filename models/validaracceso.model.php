<?php
class ValidarModel extends ModelBase
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getMenuValidar($id_rol,$id_puesto,$menu){
        $con = new Database();
        try {
          $query = $con->connect()->prepare("
          select * from asignacion_menu am
            inner join cat_menu cm
            on cm.id_menu = am.fk_id_menu
            where am.fk_id_rol_usuario in (:idRol,4)
            AND cm.fk_id_puesto in (:idPuesto,8)
            and am.fk_id_menu = :idMenu
            and am.estatus_asignacion_menu = 1;
          ");
          $query->execute(['idRol'=>$id_rol, 'idPuesto'=>$id_puesto,'idMenu'=>$menu]);
          $items = $query->fetch();
          return $items;
        } catch (PDOException $e) {
          echo "error: " . $e->getMessage();
          return [];
        }
    }

    public function getSubmenuValidar($id,$puesto,$ref_submenu){
    $con = new Database();
    try {
        $query = $con->connect()->prepare("
            SELECT * from cat_submenu cs
            WHERE cs.fk_id_menu = :idMenu
            and cs.fk_id_puesto in (:idPuesto,8)
            and cs.referencia_submenu = :refSubmenu
            and cs.estatus_submenu = 1;
        ");
        $query->execute(['idMenu'=>$id, 'idPuesto'=>$puesto, 'refSubmenu'=>$ref_submenu]);
        return $query->fetch();
    } catch (PDOException $e) {
        echo "error: " . $e->getMessage();
        return false;
    }
    }
}
?>