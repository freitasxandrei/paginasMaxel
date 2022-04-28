<div class="container" >
<section>
    <a href="lista">
        <button class="btn btn-light"> Voltar </button>
    </a>

    <h2 class="mt-3"><?php echo TITLE;?> </h2>
<br>
    <form method="POST" class="form-send">
        <div class="form-group">
            <label> Nome </label>
            <input type="text" id="estiloInput" required class="form-control" name="nome" value="<?php echo isset($obGrupo->nome) ? $obGrupo->nome : ''; ?>">
        </div>

        <div class="form-group">
            <label> Descrição </label>
            <textarea class="form-control" id="estiloInput" required name="descricao" rows="5"><?php echo isset($obGrupo->descricao) ? $obGrupo->descricao : ''; ?> </textarea>
        </div>

        <div class="form-group">
            <label> Ordem </label>
            <input type="number" id="estiloInput" required class="form-control" name="ordem" value="<?php echo isset($obGrupo->ordem) ? $obGrupo->ordem : ''; ?>">
        </div>

        <div class="form-group">
            <label> Status </label>
            <div>
                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" required name="status" value="s" <?php echo isset($obGrupo->status) && $obGrupo->status == 's' ? 'checked' : '';?>> Ativo </input>
                    </label>

                    <label class="ml-3">
                        <input type="radio" required name="status" value="n" <?php echo isset($obGrupo->status) && $obGrupo->status == 'n' ? 'checked' : '';?>> Inativo </input>
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-light"> Enviar </button>
        </div>

    </form>
</section>