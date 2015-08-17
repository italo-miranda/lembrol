<div class="row-fluid span10">
    <?php echo form_open('principal/cadastrarUsuario'); ?>
    <div id="cadastro" class="span5">
        <div name="Login" class="row-fluid">
            <?php echo form_label('Login');?>          
            <?php echo form_input(array('name'=>'cLogin', 'required'=>'required'));?>            
        </div>    
        <div name="Senha1" class="row-fluid">
            <?php echo form_label('Senha');?>
            <?php echo form_input(array('name'=>'cSenha1', 'required'=>'required', 'type'=>'password'));?>
        </div>

        <div name="Senha2" class="row-fluid">
            <?php echo form_label('Confirme a senha');?>
            <?php echo form_input(array('name'=>'cSenha2', 'required'=>'required', 'type'=>'password'));?>               
        </div>
        <div class="row-fluid"><button type="submit" class="btn-primary">Cadastrar</button></div>
        <?php echo form_close() ?>



</div>