<div class="container" >
<section>
    <a href="index">
        <button class="btn btn-light"> Voltar </button>
    </a>

    <h2 class="mt-3"><?php echo TITLE;?> </h2>
<br>
    <form method="POST" class="form-send">
        <div class="form-group">
            <label> Nome </label>
            <input type="text"  id="estiloInput" required class="form-control" name="nome" value="<?php echo isset($obUsuario->nome) ? $obUsuario->nome : ''; ?>">
        </div>
        <div class="form-group">
            <label> Sobrenome </label>
            <input type="text"  id="estiloInput" required class="form-control" name="sobrenome" value="<?php echo isset($obUsuario->sobrenome) ? $obUsuario->sobrenome : ''; ?>">
        </div>
        <div class="form-group">
            <label> CPF </label>
            <input type="number"  id="estiloInput" required class="form-control" name="cpf" value="<?php echo isset($obUsuario->cpf) ? $obUsuario->cpf : ''; ?>">
        </div>
        <div class="form-group">
            <label> Telefone </label>
            <input type="number"  id="estiloInput" required class="form-control" name="telefone" value="<?php echo isset($obUsuario->telefone) ? $obUsuario->telefone : ''; ?>">
        </div>
        <div class="form-group">
            <label> E-mail </label>
            <input type="email"  id="estiloInput" required class="form-control" name="email" value="<?php echo isset($obUsuario->email) ? $obUsuario->email : ''; ?>">
        </div>
        <div class="form-group">
            <label> Número Endereço </label>
            <input type="number"  id="estiloInput" required class="form-control" name="numero_end" value="<?php echo isset($obUsuario->numero_end) ? $obUsuario->numero_end : ''; ?>">
        </div>
        <div class="form-group">
            <label> Rua Endereço </label>
            <textarea class="form-control"  id="estiloInput" required name="rua_end" rows="5"><?php echo isset($obUsuario->rua_end) ? $obUsuario->rua_end : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label> Bairro Endereço </label>
            <textarea class="form-control"  id="estiloInput" required name="bairro_end" rows="5"><?php echo isset($obUsuario->bairro_end) ? $obUsuario->bairro_end : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label> Cidade Endereço </label>
            <textarea class="form-control"  id="estiloInput"required name="cidade_end" rows="5"><?php echo isset($obUsuario->cidade_end) ? $obUsuario->cidade_end : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label> Estado Endereço </label>
            <textarea class="form-control"  id="estiloInput" required name="estado_end" rows="5"><?php echo isset($obUsuario->estado_end) ? $obUsuario->estado_end : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label> Focal </label>
            <div>
                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" required name="focal" value="s" <?php echo isset($obUsuario->focal) && $obUsuario->focal == 's' ? 'checked' : '';?>> Sim </input>
                    </label>

                    <label class="ml-3">
                        <input type="radio" required name="focal" value="n" <?php echo isset($obUsuario->focal) && $obUsuario->focal == 'n' ? 'checked' : '';?>> Não </input>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label> Ordem </label>
            <input type="number"  id="estiloInput" required class="form-control" name="ordem" value="<?php echo isset($obUsuario->ordem) ? $obUsuario->ordem : ''; ?>">
        </div>

        <div class="form-group">

            <label for="">Empresas</label>

            <select class="form-control"  id="estiloSelect" name="fk_id_empresa">
                <option value="">Selecione uma Empresa</option>
                <?php foreach ($empresas as $key => $value) { ?>
                    <option value="<?php echo $value['id']; ?> "> <?php echo $value['nome']; ?> </option>
                <?php } ?>
            </select>

        </div>

        <div class="form-group">
            <label> Status </label>
            <div>
                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" required name="status" value="s" <?php echo isset($obUsuario->status) && $obUsuario->status == 's' ? 'checked' : '';?>> Ativo </input>
                    </label>

                    <label class="ml-3">
                        <input type="radio" required name="status" value="n" <?php echo isset($obUsuario->status) && $obUsuario->status == 'n' ? 'checked' : '';?>> Inativo </input>
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-light"> Enviar </button>
        </div>

    </form>
</section>