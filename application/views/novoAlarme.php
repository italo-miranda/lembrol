<div class="row-fluid span10">
    <div id='cadastroAlarme' class="row-fluid">
        <?php echo form_open('cPagina/inserirAlarme'); ?>
        <div id="cadastro" class="span5">
            <div id="data" class="row-fluid">
                <fieldset>Data</fieldset>
                <input type="date" name='aData'>
            </div>
            <div id="hora" class="row-fluid">
                <fieldset>Hora</fieldset>
                <input type="time" name='aHora'>
            </div>

            <div class="row-fluid"><button type="submit" class="btn-primary">Cadastrar</button></div>

            <?php echo form_close() ?>            
        </div>
    </div>
</div>