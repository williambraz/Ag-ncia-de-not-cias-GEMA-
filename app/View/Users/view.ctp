<!-- File: /app/View/Users/edit.ctp -->

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

        if ($this->session->read('Auth.user.role') == 'admin'){
          echo $this->Form->input('role', array('label'=>'Papel:',
              'options' => array('jornalista' => 'Jornalista', 'revisor' => 'Revisor', 'publicador' => 'Publicador', 'gerente' => 'Gerente')
          ));
          echo $this->Form->input('section', array('label'=>'Seção:',
              'options' => array('games' => 'Games', 'quadrinhos' => 'Quadrinhos', 'musica' => 'Música', 'series' => 'Séries e TV')
          ));
        }
        echo $this->Form->end('Salvar');
    	?>

    </div>

  </div><!-- /.box-body -->
  <div class="box-footer center">
    <?php echo $this->Html->link('Voltar', array('controller' => 'posts', 'action' => 'index'),array('class'=>'btn btn-primary'));?>
  </div><!-- box-footer -->
</div><!-- /.box -->

<script type="text/javascript">
  $(document).ready( function() {
          
    $('select').select2({ width: '100%' });              
       
  });
</script>