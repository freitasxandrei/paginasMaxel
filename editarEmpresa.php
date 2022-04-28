<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar registro!');

use App\entity\Empresa;
use App\entity\Grupo;

//Validação do ID
if (!isset($_GET['id'])  || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//Consulta Vaga
$obEmpresa = Empresa::getArEmpresa($_GET['id']);
// echo "<pre>"; print_r($obGrupo); echo "<pre>"; exit;

//Validação da Vaga
if (!$obEmpresa instanceof Empresa) {
    header('location: index.php?status=error');
    exit;
}
// echo "<pre>"; print_r($obGrupo); echo "<pre>"; exit;

//Validação do POST
if (isset($_POST['nome_fantasia'], $_POST['nome'], $_POST['cnpj'], $_POST['descricao'], $_POST['numero_end'], $_POST['rua_end'], $_POST['bairro_end'], $_POST['cidade_end'], $_POST['estado_end'], $_POST['ordem'], $_POST['status'], $_POST['fk_id_grupo'])) {
    $obEmpresa->nome_fantasia = $_POST['nome_fantasia'];
    $obEmpresa->nome = $_POST['nome'];
    $obEmpresa->cnpj = $_POST['cnpj'];
    $obEmpresa->descricao = $_POST['descricao'];
    $obEmpresa->numero_end = $_POST['numero_end'];
    $obEmpresa->rua_end = $_POST['rua_end'];
    $obEmpresa->bairro_end = $_POST['bairro_end'];
    $obEmpresa->cidade_end = $_POST['cidade_end'];
    $obEmpresa->estado_end = $_POST['estado_end'];
    $obEmpresa->ordem = $_POST['ordem'];
    $obEmpresa->status = $_POST['status'];
    $obEmpresa->fk_id_grupo = $_POST['fk_id_grupo'];

    $obEmpresa->atualizarEmpresa();
    // echo "<pre>"; print_r($obGrupo); echo "</pre>"; exit; 

    header('location: listaEmpresa.php?status=success');
    exit;
    
}

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/formularioEmpresa.php';

require __DIR__ . '/INCLUDES/footer.php';