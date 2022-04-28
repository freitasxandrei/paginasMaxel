<?php
$mensagem = '';
if (isset($_GET['status'])) {
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

<?php if ($mensagem != '') { ?>
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
        <a href="cadastrarEmpresa">
        <button type="botao_comeco"><span class="spano"></span>Cadastrar</button>
        </a>

    </section>

    <section>

        <form action="listaEmpresa.php" method="get" class="teste">

            <div class="row">

                <div class="col-3">

                    <select class="form-control" placeholder="Selecione um Grupo" name="grupo" value="">
                        <option value="">Selecione um Grupo</option>
                        <?php foreach ($listaGrupo as $key => $value) { ?>
                            <option value="<?php echo $value->id; ?> "> <?php echo $value->nome; ?> </option>
                        <?php } ?>
                    </select>

                </div>
                <br>
                <input type="text" name="busca" class="form-control" id="filtroCnpj" placeholder="FIltrar por CNPJ"></input>
                

                <div class="col-3">
                    <button type="submit" class="btn btn-light">Filtrar</button>
                </div>
            </div>
        </form>

    </section>

    <?php if (count($grupos) == 0) { ?>
        <div class="alert alert-secondary mt-3"> Nenhuma Empresa Encontrada </div>

    <?php } else { ?>

        <table class="table bg-dark text-light">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Fantasia</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Descrição</th>
                    <th>Núm. Endereço</th>
                    <th>Rua Endereço</th>
                    <th>Bairro Endereço</th>
                    <th>Cidade Endereço</th>
                    <th>Estado Endereço</th>
                    <th>Ordem</th>
                    <th>Grupo</th>
                    <th>Status</th>
                    <!-- Para editar e excluir -->
                </tr>
            </thead>

            <tbody>
                <?php foreach ($grupos as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['nome_fantasia'];; ?></td>
                        <td><?php echo $value['nome']; ?></td>
                        <td><?php echo $value['cnpj']; ?></td>
                        <td><?php echo $value['descricao']; ?></td>
                        <td><?php echo $value['numero_end']; ?></td>
                        <td><?php echo $value['rua_end']; ?></td>
                        <td><?php echo $value['bairro_end']; ?></td>
                        <td><?php echo $value['cidade_end']; ?></td>
                        <td><?php echo $value['estado_end']; ?></td>
                        <td><?php echo $value['ordem']; ?></td>
                        <td><?php echo $value['fk_id_grupo']->nome; ?></td>
                        <td><?php echo ($value['status'] == 's' ? 'Ativo' : 'Inativo'); ?></td>
                        <td>
                            <a class="neon-bt2" id="botones" href="editarEmpresa.php?id=<?php echo $value['id']; ?>">

                                <span></span>

                                Editar 

                            </a>

                            <a class="neon-bt" id="botones" href="excluirEmpresa.php?id=<?php echo $value['id']; ?>">

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
</div>

