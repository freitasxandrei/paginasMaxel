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

<section>
    <a href="cadastrar">
        <button class="btn btn-success"> Cadastrar </button>
    </a>

    <?php if(count($Grupo) == 0) { ?>
    <div class="alert alert-secondary mt-3"> Nenhum Registro Encontrado </div>

    <?php } else { ?>

        <table class="table bg-light mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data de Inclusão</th>
                <th>Status</th>
                <th>Ordem</th>
                <!-- Para editar e excluir --> 
            </tr>
        </thead>
 
        <tbody>
            <?php foreach ($Grupo as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->nome; ?></td>
                    <td><?php echo $value->descricao; ?></td>
                    <td><?php echo $value->data_inc; ?></td>
                    <td><?php echo ($value->status == 's' ? 'Ativo' : 'Inativo'); ?></td>
                    <td><?php echo $value->ordem; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $value->id; ?>">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>

                        <a href="excluir.php?id=<?php echo $value->id; ?>">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php } ?>

</section>