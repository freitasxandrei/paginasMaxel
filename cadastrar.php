<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar registro!');

use App\entity\Grupo;

$obGrupo = new Grupo;

if (isset($_POST['nome'], $_POST['descricao'], $_POST['ordem'], $_POST['status'])) {
    $obGrupo->nome = $_POST['nome'];
    $obGrupo->descricao = $_POST['descricao'];
    $obGrupo->ordem = $_POST['ordem'];
    $obGrupo->status = $_POST['status'];

// echo "<pre>"; print_r($obGrupo); echo "<pre>"; exit;


    $obGrupo->cadastrar();

    header('location: lista.php?status=success');
    // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    exit;
}

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/formularioGrupo.php';
require __DIR__ . '/includes/footer.php';
