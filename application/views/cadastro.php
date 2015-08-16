<div class="row-fluid span10">
    <?php echo form_open('principal/cadastrarUsuario', array('id' => 'form')); ?>
    <div id="cadastro" class="span5">
        <div name="cLogin" class="row-fluid">
            <fieldset>Login</fieldset>
            <input type="text" name='cLogin' required="required">
        </div>    
        <div name="cSenha1" class="row-fluid">
            <fieldset>Senha</fieldset>
            <input type="text" name='cSenha1' required="required">
        </div>

        <div name="cSenha2" class="row-fluid">
            <fieldset>Confirme a senha</fieldset>
            <input type="text" name='cSenha2' required="required">                
        </div>
        <div class="row-fluid"><button type="submit" class="btn-primary">Cadastrar</button></div>
        <?php echo form_close() ?>

    </div>
</div>