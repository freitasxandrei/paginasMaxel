<div class="container" >
<section>
    <a href="listaEmpresa">
        <button class="btn btn-light"> Voltar </button>
    </a>

    <h2 class="mt-3"><?php echo TITLE; ?> </h2>
<br>
    <form method="POST" class="form-send">
        <div class="form-group andrei">
                
            <input type="text" placeholder=" Nome Fantasia" id="estiloInput" required class="form-control" name="nome_fantasia" value="<?php echo isset($obEmpresa->nome_fantasia) ? $obEmpresa->nome_fantasia : ''; ?>">
        </div>
        <div class="form-group andrei">
            <label> Nome </label>
            <input type="text"  id="estiloInput" required class="form-control" name="nome" value="<?php echo isset($obEmpresa->nome) ? $obEmpresa->nome : ''; ?>">
        </div>
        <div class="form-group">
            <label> CNPJ </label>
            <input type="number"  id="estiloInput" required class="form-control" name="cnpj" value="<?php echo isset($obEmpresa->cnpj) ? $obEmpresa->cnpj : ''; ?>">
        </div>
        <div class="form-group">
            <label> Descrição </label>
            <textarea class="form-control"  id="estiloInput" required name="descricao" rows="5"><?php echo isset($obEmpresa->descricao) ? $obEmpresa->descricao : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label> Numero Endereço </label>
            <input type="number" id="estiloInput" required class="form-control" name="numero_end" value="<?php echo isset($obEmpresa->numero_end) ? $obEmpresa->cnpj : ''; ?>">
        </div>
        <div class="form-group">
            <label> Rua Endereço </label>
            <textarea class="form-control" id="estiloInput" required name="rua_end" rows="5"><?php echo isset($obEmpresa->rua_end) ? $obEmpresa->rua_end : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label> Bairro Endereço </label>
            <textarea class="form-control"  id="estiloInput"required name="bairro_end" rows="5"><?php echo isset($obEmpresa->bairro_end) ? $obEmpresa->bairro_end : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label> Cidade Endereço </label>
            <textarea class="form-control"  id="estiloInput"required name="cidade_end" rows="5"><?php echo isset($obEmpresa->cidade_end) ? $obEmpresa->cidade_end : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label> Estado Endereço </label>
            <textarea class="form-control"  id="estiloInput"required name="estado_end" rows="5"><?php echo isset($obEmpresa->estado_end) ? $obEmpresa->estado_end : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label> Ordem </label>
            <input type="number"  id="estiloInput"required class="form-control" name="ordem" value="<?php echo isset($obEmpresa->ordem) ? $obEmpresa->ordem : ''; ?>">
        </div>

        <div class="form-group">

            <label for="">Grupos</label>

            <select class="form-control"  id="estiloSelect"name="fk_id_grupo">
                <option value="">Selecione um Grupo</option>
                <?php foreach ($grupos as $key => $value) { ?>
                    <option value="<?php echo $value->id; ?> " <?php echo $obEmpresa->fk_id_grupo == $value->id ? 'selected' : ''; ?>> <?php echo $value->nome; ?> </option>
                <?php } ?>
            </select>

            
        </div>

        <div class="form-group">
            <label> Status </label>
            <div>
                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" required name="status" value="s" <?php echo isset($obEmpresa->status) && $obEmpresa->status == 's' ? 'checked' : ''; ?>> Ativo </input>
                    </label>

                    <label class="ml-3">
                        <input type="radio" required name="status" value="n" <?php echo isset($obEmpresa->status) && $obEmpresa->status == 'n' ? 'checked' : ''; ?>> Inativo </input>
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-light"> Enviar </button>
        </div>

    </form>
</section>