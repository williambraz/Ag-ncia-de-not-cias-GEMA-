<!-- app/View/Users/login.ctp -->

<?php echo $this->element('menu_login') ?>

<div class="box box-primary">
	  <div class="box-header">
	    <h3 class="box-title">Login</h3>
	  </div><!-- /.box-header -->
	  <div class="box-body">

		<!--<div class="users form">-->
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('User');?>
		    <fieldset>
		        <?php echo $this->Form->input('username',array('label'=>'Login:'));
		        echo $this->Form->input('password',array('label'=>'Senha:','required' => 'false'));
		    ?>
		    </fieldset>
		<?php echo $this->Form->end(__('Logar'));?>
		<!--<?php echo $this->Html->link('Cadastrar', array('controller' => 'users', 'action' => 'add'));?>-->
		<!--</div>-->

	  </div><!-- /.box-body -->
	<div class="box-footer">

	</div><!-- box-footer -->
</div><!-- /.box -->