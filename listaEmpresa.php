<?php 

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Empresa;
    use \App\Entity\Grupo;
    
    $busca = '';

    if(isset( $_GET['grupo']) || isset( $_GET['busca'])) {
        if(isset( $_GET['grupo']) && $_GET['grupo'] != 0) {
            $busca = 'fk_id_grupo = ' . $_GET['grupo'];

            if(!empty($_GET['busca']) && count($_GET) > 1) {
                $busca .= ' AND ';
            }
        }

        if(!empty($_GET['busca'])) {
            $busca .= 'cnpj = ' . $_GET['busca'];
        }

        // echo $busca;
    }

    $listaGrupo = Grupo::getnoar();
    $grupos = Empresa::getnoar($busca); 

    // echo "<pre>"; print_r ($_GET['grupo']); echo "</pre>"; exit; 

    // use App\includes\listagemEmpresa;
    // //BUSCA
    // if(isset($busca = $_GET['busca']); 
    // echo "<pre>"; print_r ($busca); echo "</pre>"; exit; 


    require __DIR__.'/includes/header.php';

    require __DIR__.'/includes/listagemEmpresa.php';   

    require __DIR__.'/includes/footer.php';
