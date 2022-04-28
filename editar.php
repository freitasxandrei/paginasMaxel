<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar registro!');

use App\entity\Grupo;

//Validação do ID
if (!isset($_GET['id'])  || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//Consulta Vaga
$obGrupo = Grupo::getArGrupo($_GET['id']);
// echo "<pre>"; print_r($obGrupo); echo "<pre>"; exit;

//Validação da Vaga
if (!$obGrupo instanceof Grupo) {
    header('location: index.php?status=error');
    exit;
}
// echo "<pre>"; print_r($obGrupo); echo "<pre>"; exit;

//Validação do POST
if (isset($_POST['nome'], $_POST['descricao'], $_POST['ordem'], $_POST['status'])) {
    $obGrupo->nome = $_POST['nome'];
    $obGrupo->descricao = $_POST['descricao'];
    $obGrupo->ordem = $_POST['ordem'];
    $obGrupo->status = $_POST['status'];

    $obGrupo->atualizar();
    // echo "<pre>"; print_r($obGrupo); echo "</pre>"; exit; 

    header('location: lista.php?status=success');
    exit;
    
}

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/formularioGrupo.php';

require __DIR__ . '/INCLUDES/footer.php';

