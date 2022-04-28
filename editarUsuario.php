<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar registro!');

use App\entity\Usuario;
use App\entity\Empresa;

//Validação do ID
if (!isset($_GET['id'])  || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//Consulta Vaga
$obUsuario = Usuario::getArUsuario($_GET['id']);

//Validação da Vaga
if (!$obUsuario instanceof Usuario) {
    header('location: index.php?status=error');
    exit;
}

//Validação do POST
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

    $obUsuario->atualizarUsuario();

    header('location: listaUsuario.php?status=success');
    exit;
    
}

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/formularioUsuario.php';

require __DIR__ . '/INCLUDES/footer.php';