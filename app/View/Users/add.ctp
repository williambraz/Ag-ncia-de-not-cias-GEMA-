<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Adicione usuário'); ?></legend>
        <?php 
	        echo $this->Form->input('username', array('label'=>'Login:'));
	        echo $this->Form->input('password', array('label'=>'Senha:'));
	        echo $this->Form->input('name', array('label'=>'Nome Completo:'));
	        echo $this->Form->input('role', array('label'=>'Papel:',
	            'options' => array('jornalista' => 'Jornalista', 'revisor' => 'Revisor', 'publicador' => 'Publicador', 'gerente' => 'Gerente')
	        ));
	        echo $this->Form->input('section', array('label'=>'Seção:',
	            'options' => array('games' => 'Games', 'quadrinhos' => 'Quadrinhos', 'música' => 'Música', 'séries' => 'Séries e TV')
	        ));
    	?>
    </fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
</div>