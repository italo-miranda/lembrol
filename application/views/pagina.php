<div id="paginaInicial" class="container-fluid">
    <div class="row-fluid">
        <div class="offset2"><?php echo anchor('cPagina/novaTarefa', 'Nova tarefa') ?></div>
        <div class="offset2"><?php echo anchor('cPagina/novoAlarme', 'Novo alarme') ?></div>
    </div>    
    <div class="span2 tarefas coisas">

        <?php
        echo form_open();
        foreach ($tarefas as $key):
            echo '<div class="row-fluid">';
            echo form_label('Título');
            echo $key->titulo;
            echo '</div>';

            echo '<div class="row-fluid">';
            echo form_label('Data');
            echo $key->data;
            echo '</div>';

            echo '<div class="row-fluid">';
            echo form_label('Hora');
            echo $key->hora;
            echo '</div>';

            echo '<div class="row-fluid">';
            echo form_label('Descrição');
            echo $key->descricao;
            echo '</div>';
            
            echo form_button(array('type' => 'submit', 'name' => 'excluir', 'class' => 'btn btn-danger', 'formaction' => "cPagina/deletarTarefa/$key->tarefaId"), 'Excluir tarefa');
        endforeach;
        echo form_close();
        ?>

    </div>

    <div class="span2 tarefas coisas">
        <?php
        echo form_open();
        foreach ($alarmes as $key):
            echo '<div class="row-fluid">';
            echo form_label('Alarme');
            echo '</div>';

            echo '<div class="row-fluid">';
            echo form_label('Data');
            echo $key->data;
            echo '</div>';

            echo '<div class="row-fluid">';
            echo form_label('Hora');
            echo $key->hora;
            echo '</div>';
            
            echo form_button(array('type' => 'submit', 'name' => 'excluir', 'class' => 'btn btn-danger', 'formaction' => "cPagina/deletarAlarme/$key->alarmeId"), 'Excluir alarme');
        endforeach;
        echo form_close();
        ?>
    </div>

</div>