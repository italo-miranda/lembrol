<div id="paginaInicial" class="container-fluid">
    <div class="row-fluid span10">
        <div id='cadastroTarefa' class="row-fluid">
            <?php echo form_open('cPagina/inserirTarefa', array('id' => 'form')); ?>
            <div id="cadastro" class="span5">
                <div id="titulo" class="row-fluid">
                    <fieldset>Titulo</fieldset>
                    <input type="text" name='tTitulo'>
                </div>
                <div id="data" class="row-fluid">
                    <fieldset>Data</fieldset>
                    <input type="date" name='tData'>
                </div>
                <div id="hora" class="row-fluid">
                    <fieldset>Hora</fieldset>
                    <input type="time" name='tHora'>
                </div>
                <div id="descricao" class="row-fluid">
                    <fieldset>Descrição</fieldset>
                    <input type="textarea" name='tDescricao'>
                </div>
                <div class="row-fluid"><button type="submit" class="btn-primary">Cadastrar</button></div>

                <?php echo form_close() ?>            
            </div>
        </div>
    </div>
</div>