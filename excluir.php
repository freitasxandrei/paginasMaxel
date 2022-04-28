<?php 
    require __DIR__.'/vendor/autoload.php';

use \App\entity\Grupo;

    // Validação do ID
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('location: lista.php?status=error');
        exit;
    }

    // Consulta Vaga
    $obGrupo = Grupo::getArGrupo($_GET['id']);
    // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    // Validação da Vaga
    if(!$obGrupo instanceof Grupo) {
        // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

        header('location: lista.php?status=error');
        exit;
    }

    // Validação do Post
    if(isset($_POST['excluir'])) {

        $obGrupo->excluir();

        header('location: lista.php?status=success');
        exit;
    }

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarExclusao.php';
    require __DIR__.'/includes/footer.php';
?>