<?php
require_once('../clase/DB.php');
require_once('../clase/regis_herra.php');
require_once('../clase/condicion.php');

if(isset($_POST['guardar'])){
    $h=new Herramienta();

    $h->setTools($_POST['tools']);
    $h->setSerie($_POST['serie']);
    $h->setMarca($_POST['marca']);
    $h->setEstado($_POST['estado']);
    
     foreach ($_POST['condiciones'] as $key => $condId) {
            $h->addCondId($condId);
        }
        $h->guardar();
        header("Location: ../main.php?success=1");
}
?>