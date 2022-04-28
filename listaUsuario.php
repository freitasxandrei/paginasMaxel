<?php 

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Usuario;
    use \App\Entity\Empresa;
    
    $busca = '';

    if(isset( $_GET['empresa']) || isset( $_GET['busca'])) {
        if(isset( $_GET['empresa']) && $_GET['empresa'] != 0) {
            $busca = 'fk_id_empresa = ' . $_GET['empresa'];

            if(!empty($_GET['busca']) && count($_GET) > 1) {
                $busca .= ' AND ';
            }
        }

        if(!empty($_GET['busca'])) {
            $busca .= 'cpf = ' . $_GET['busca'];
        }

        // echo $busca;
    }

    $listaEmpresa = Empresa::getnoar();
    $empresas = Usuario::getnoar($busca);

    // echo "<pre>"; print_r ($vagas); echo "</pre>"; exit; 


    require __DIR__.'/includes/header.php';

    require __DIR__.'/includes/listagemUsuario.php';   

    require __DIR__.'/includes/footer.php';
?>