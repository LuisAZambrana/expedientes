<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, adma_menu_i0.* FROM adma_menu_i0  where itemmenuid = -1",1,0);
$el_row["abm"]="a";
$el_row["menuid"]=$_POST["menuid"];
$el_row["formularioid"]=$_POST["formularioid"];
$el_row["text"]= $_POST["text"];
$el_row["navigateurl"]= $_POST["navigateurl"];
$el_row["imagen"]=  isset($_POST["imagen"])? $_POST["imagen"]:0;
$el_row["imageurl"]= $_POST["imageurl"];
$el_row["permitegif"]= isset($_POST["permitegif"])? $_POST["permitegif"]:0;
$el_row["imagengif"]= $_POST["imagengif"];
$el_row["tipofuncion"]= $_POST["tipofuncion"];
$el_row["funcionasociadagif"]= $_POST["funcionasociadagif"];
$el_row["grupo"]= $_POST["grupo"];
$el_row["orden"]= $_POST["orden"];
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("adma_menu_i0",1,$el_row);
if ($prueba_1 > 0) {header("Location:index.php?id=".$db->codificar_valor($_POST["menuid"],1));
}else{header("Location:crear.php?id=".$db->codificar_valor($_POST["menuid"],1));}
?>