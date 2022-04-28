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

<div class="containe1" style="margin: 5%;">

<section>
<a href="cadastrarUsuario">
        <button type="botao_comeco"><span class="spano"></span>Cadastrar</button>
        </a>

    <section>

        <form action="listaUsuario.php" method="get">

            <div class="row">

                <div class="col-12 col-lg-6">

                    <select class="form-control" name="empresa" value="">
                        <option value="">Selecione uma Empresa</option>
                        <?php foreach ($listaEmpresa as $key => $value) { ?>
                            <option value="<?php echo $value['id']; ?> "> <?php echo $value['nome']; ?> </option>
                        <?php } ?>
                    </select>

                </div>

                <br>

                <input type="text" name="busca" id="filtroCnpj" class="form-control" placeholder="FIltrar por CPF">

                <div class="col-12 col-lg-6">
                    <button type="submit" class="btn btn-light">Filtrar</button>
                </div>
            </div>
        </form>

    </section>

    <?php if(count($empresas) == 0) { ?>
    <div class="alert alert-secondary mt-3"> Nenhum Usuário Encontrada </div>

    <?php } else { ?>

        <table class="table bg-dark text-light mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Cidade Endereço</th>
                <th>Estado Endereço</th>
                <th>Focal</th>
                <th>Ordem</th>
                <th>Empresa</th>
                <th>Status</th>
            </tr>
        </thead>
 
        <tbody>
            <?php foreach ($empresas as $key => $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['nome'] ?></td>
                    <td><?php echo $value['sobrenome'] ?></td>
                    <td><?php echo $value['cpf'] ?></td>
                    <td><?php echo $value['telefone'] ?></td>
                    <td><?php echo $value['email']?></td>
                    <td><?php echo $value['numero_end'] ?></td>
                    <td><?php echo $value['rua_end'] ?></td>
                    <td><?php echo $value['bairro_end'] ?></td>
                    <td><?php echo $value['cidade_end'] ?></td>
                    <td><?php echo $value['estado_end'] ?></td>
                    <td><?php echo ($value['focal'] == 's' ? 'É focal' : 'Não é focal'); ?></td>
                    <td><?php echo $value['ordem'] ?></td>
                    <td><?php echo $value['fk_id_empresa']->nome; ?></td>
                    <td><?php echo ($value['status'] == 's' ? 'Ativo' : 'Inativo'); ?></td>
                    <td>
                    <a class="neon-bt2" href="editarUsuario.php?id=<?php echo $value['id'] ?>">

                            <span></span>

                            <span></span>

                            <span></span>

                            <span></span>

                            Editar

                            </a>

                        <a class="neon-bt" href="excluirUsuario.php?id=<?php echo $value['id'] ?>">

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

    <?php } ?>

</section>