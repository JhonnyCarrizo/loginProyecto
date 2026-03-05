<?php
require_once('../clase/DB.php');
require_once('../clase/regis_herra.php');
require_once('../clase/condicion.php');

if(isset($_POST['guardar'])){
    $h=new Herramienta();

    $h->setId($_GET['herramientaId']);
    $h->setTools($_POST['tools']);
    $h->setSerie($_POST['serie']);
    $h->setMarca($_POST['marca']);
    $h->setEstado($_POST['estado']);
    
     foreach ($_POST['condiciones'] as $key => $condId) {
            $h->addCondId($condId);
        }
        $h->guardar();
        header("Location: ../main.php");
    }
    if (isset($_GET['guardar'])) { 
            $h=new Herramienta();
  
        $h->setId($_GET['herramientaId']);
        $h->setTools($_GET['tools']);
        $h->setSerie($_GET['serie']);
        $h->setMarca($_GET['marca']);
        $h->setEstado($_GET['estado']);
         foreach ($_GET['condiciones'] as $key => $condId) {
            $h->addCondId($condId);
        }
        $h->editar();
        header("Location: ../main.php");
    }


?>