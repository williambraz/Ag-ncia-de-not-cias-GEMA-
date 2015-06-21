<!-- app/View/Users/login.ctp -->
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Logue para acessar o conteúdo protegido'); ?></legend>
        <?php echo $this->Form->input('username',array('label'=>'Login:'));
        echo $this->Form->input('password',array('label'=>'Senha:'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login'));?>
<?php echo $this->Html->link('Cadastrar', array('controller' => 'users', 'action' => 'add'));?>
</div>