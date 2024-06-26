<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM sema_usuario_i0 WHERE asociacionid=".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
    $sql_="SELECT * FROM tbl_member WHERE id=". $date['personaid'];
    $aux = $obj->fcGetSQL($sql_,true,2);
    $ruta="/proyecto/view/tbl_member/";
?>
<section id="roles_activos" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Roles Activos de Usuario</h2>
          <p>Cargar, editar y borrar un rol activo de un Usuario</p>
        </div>
<div class="container" data-aos="fade-up">
   
  
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">AsociacionId</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="asociacionid" value="<?= $date['asociacionid']  ?>">
        </div>
    </div> 
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre Usuario</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="username" value="<?= $aux['username']  ?>">
        </div>
    </div> 
 
<div class="pb-3">
<a href="<? echo("index.php?id=".$obj->codificar_valor($date['personaid'],1)) ?>" class="btn btn-primary"> Regresar </a>
<a href="edit.php?id=<?= $obj->codificar_valor($date['asociacionid'],1)?>" class="btn btn-success"> Actualizar </a>
<a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> Eliminar </a>
<!-- Button trigger modal -->
<!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  Esta seguro que quiere eliminar el registro?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                  <a href="delete.php?id=<?= $obj->codificar_valor($date['asociacionid'],1)?>" type="button" class="btn btn-danger">Eliminar!</a>
                  </div>
        </div>
      </div>
  </div>
 
</div>
<?php
    echo($obj->configurar_grilla_sin_control(19," baja = 0 and personaid=".$date['personaid']));
?>

</div>
</div>
<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/fooder.php");
?>