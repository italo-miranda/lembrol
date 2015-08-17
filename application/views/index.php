

        <div id="cadastroLogin" class="span8 warning offset3">
            <div class="row-fluid span10">        
                <?php echo form_open('principal/fazerLogin', array('id' => 'form')); ?>
                <div id="login" class="span5">
                    <div id="Login" class="row-fluid">
                        <fieldset>Login</fieldset>
                        <input type="text" name="login">
                    </div>
                    <div id="Senha" class="row-fluid">
                        <fieldset>Senha</fieldset>
                        <input type="text" name="senha" type="password">
                    </div>
                    <div id="cSenha2" class="row-fluid">
                        <button type="submit" class="btn-success">Entrar</button>
                        <?php echo anchor('principal/cadastrarUsuario', 'Não sou cadastrado') ?>
                    </div>
                </div>                
                <?php echo form_close() ?>
            </div>
        </div>

