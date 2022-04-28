<?php 
    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Grupo;
    use \App\Entity\Empresa;     
      
    $fk_id_grupo = new Grupo;

    $listaGrupo = $fk_id_grupo::getnoar();

    use App\entity\Usuario;
    $Usuario = Usuario::getnoar();
    // echo "<pre>"; print_r($vaga); echo "</pre>"; exit;

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/banner.php';
    require __DIR__.'/includes/footer.php';
?>