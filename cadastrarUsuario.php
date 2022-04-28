<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar registro!');

use App\entity\Usuario;
use App\entity\Empresa;

$empresas = Empresa::getnoar();

$obUsuario = new Usuario();

// echo "<pre>"; print_r($_POST); echo "<pre>"; exit;
if (isset($_POST['nome'], $_POST['sobrenome'], $_POST['cpf'], $_POST['telefone'], $_POST['email'], $_POST['numero_end'], $_POST['rua_end'], $_POST['bairro_end'], $_POST['cidade_end'], $_POST['estado_end'], $_POST['focal'], $_POST['ordem'], $_POST['status'])) {
    $obUsuario->nome = $_POST['nome'];
    $obUsuario->sobrenome = $_POST['sobrenome'];
    $obUsuario->cpf = $_POST['cpf'];
    $obUsuario->telefone = $_POST['telefone'];
    $obUsuario->email = $_POST['email'];
    $obUsuario->numero_end = $_POST['numero_end'];
    $obUsuario->rua_end = $_POST['rua_end'];
    $obUsuario->bairro_end = $_POST['bairro_end'];
    $obUsuario->cidade_end = $_POST['cidade_end'];
    $obUsuario->estado_end = $_POST['estado_end'];
    $obUsuario->focal = $_POST['focal'];
    $obUsuario->ordem = $_POST['ordem'];
    $obUsuario->status = $_POST['status'];
    $obUsuario->fk_id_empresa = $_POST['fk_id_empresa'];


// echo "<pre>"; print_r($obGrupo); echo "<pre>"; exit;


    $obUsuario->cadastrarUsuario();

    header('location: listaUsuario.php?status=success');
    // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    exit;
}


require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/formularioUsuario.php';
require __DIR__ . '/includes/footer.php';
