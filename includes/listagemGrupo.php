<?php
    $mensagem = '';
    if(isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
                break;
            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
                    break;
            default:
                # code...
                break;
        }
    }
?>

<?php if($mensagem != '') { ?>
<section>
    <?php echo $mensagem; ?>
</section>
<?php } ?>

<header>
    

    <a href="index.php">
        <img id="logo" src="assets/image/logo.jpg" alt="">
    </a>
    <ul>
        <a href="lista">
            <li class="redirecionar">Grupos</li>
        </a>
        <a href="listaEmpresa">
            <li class="redirecionar">Empresas</li>
        </a>
        <a href="listaUsuario">
            <li class="redirecionar">Usuários</li>
        </a>
    </ul>

</header>

 <div class="container">

<section>
    
    <div class="card bg-dark text-light mb-3">
  <img src="assets/image/fundo2.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"> 

    <a href="cadastrar">
        <button class="btn btn-light">Cadastrar</button>
    </a>

</h5>
    <?php if(count($grupos) == 0) {?>
        <div class="alert alert-secondary mt-3">Nenhuma noticia encontrada</div>
    <?php } else {?>
        <table class="table bg-dark text-light mt-3">
        <thead>
            <tr>
            <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Ordem</th>
                <th>Ações</th>  <!-- Para editar e excluir --> 
            </tr>
        </thead>

        <tbody>
            <?php foreach ($grupos as $key => $value) { ?>
                <tr>
                <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->nome; ?></td>
                    <td><?php echo $value->descricao; ?></td>
                    <td><?php echo ($value->status == 's' ? 'Ativo' : 'Inativo'); ?></td>
                    <td><?php echo $value->ordem; ?></td>
                    <td>
                    <a class="neon-bt2" href="editar.php?id=<?php echo $value->id; ?>">

                            <span></span>

                            <span></span>

                            <span></span>

                            <span></span>

                            Editar

                            </a>

                        <a class="neon-bt" href="excluir.php?id=<?php echo $value->id; ?>">

                            <span></span>

                            <span></span>

                            <span></span>

                            <span></span>

                            Excluir

                            </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php }?>
  </div>
</div>

</section>

