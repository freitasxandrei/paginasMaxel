<?php 

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Grupo;
    $grupos = Grupo::getnoar();
    // echo "<pre>"; print_r ($vagas); echo "</pre>"; exit; 


    require __DIR__.'/includes/header.php';

    require __DIR__.'/includes/listagemGrupo.php';   

    require __DIR__.'/includes/footer.php';
?>
