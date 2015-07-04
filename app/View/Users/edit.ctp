<!-- File: /app/View/Users/edit.ctp -->

<?php echo $this->element('menu') ?>

<div class="clear"></div>

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Edição de Usuário</h3>
  </div><!-- /.box-header -->
  <div class="box-body">

    <div>

    	<?php
        echo $this->Form->create('User', array('action' => 'edit'));
        echo $this->Form->input('username', array('label'=>'Login:','disabled' => 'disabled'));
        echo $this->Form->input('password', array('label'=>'Senha:','required' => 'false'));
        echo $this->Form->input('name', array('label'=>'Nome Completo:'));
        echo $this->Form->input('role', array('label'=>'Papel:',
            'options' => array('jornalista' => 'Jornalista', 'revisor' => 'Revisor', 'publicador' => 'Publicador', 'gerente' => 'Gerente')
        ));
        echo $this->Form->input('section', array('label'=>'Seção:',
            'options' => array('games' => 'Games', 'quadrinhos' => 'Quadrinhos', 'música' => 'Música', 'séries' => 'Séries e TV')
        ));
        echo $this->Form->end('Salvar');
    	?>

    </div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    
  </div><!-- box-footer -->
</div><!-- /.box -->