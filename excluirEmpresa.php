<?php 
    require __DIR__.'/vendor/autoload.php';

use \App\entity\Empresa;

    // Validação do ID
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('location: listaEmpresa.php?status=error');
        exit;
    }

    // Consulta Vaga
    $obEmpresa = Empresa::getArEmpresa($_GET['id']);

    // Validação da Vaga
    if(!$obEmpresa instanceof Empresa) {
        header('location: listaEmpresa.php?status=error');
        exit;
    }

    // Validação do Post
    if(isset($_POST['excluirEmpresa'])) {

        $obEmpresa->excluir();

        header('location: listaEmpresa.php?status=success');
        exit;
    }

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarExclusaoEmpresa.php';
    require __DIR__.'/includes/footer.php';

?>