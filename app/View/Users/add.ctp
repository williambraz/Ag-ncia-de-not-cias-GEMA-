<!-- app/View/Users/add.ctp -->

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Adicionar usuário</h3>
  </div><!-- /.box-header -->
  <div class="box-body">

	<?php echo $this->Form->create('User');?>
	    <fieldset>
	        <?php 
		        echo $this->Form->input('username', array('label'=>'Login:'));
		        echo $this->Form->input('password', array('label'=>'Senha:'));
		        echo $this->Form->input('name', array('label'=>'Nome Completo:'));
		        echo $this->Form->input('role', array('label'=>'Papel:',
		            'options' => array('jornalista' => 'Jornalista', 'revisor' => 'Revisor', 'publicador' => 'Publicador', 'gerente' => 'Gerente')
		        ));
		        echo $this->Form->input('section', array('label'=>'Seção:',
		            'options' => array('games' => 'Games', 'quadrinhos' => 'Quadrinhos', 'musica' => 'Música', 'series' => 'Séries e TV')
		        ));
	    	?>
	    </fieldset>
	<?php echo $this->Form->end(__('Enviar'));?>

  </div><!-- /.box-body -->
  <div class="box-footer center">
    <?php echo $this->Html->link('Voltar', array('controller' => 'posts', 'action' => 'index'),array('class'=>'btn btn-primary'));?>
  </div><!-- box-footer -->
</div><!-- /.box -->