<!-- File: /app/View/Posts/add.ctp -->

<?php echo $this->element('menu') ?>

<div class="clear"></div>

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Adicionar Matéria</h3>
  </div><!-- /.box-header -->
  <div class="box-body">

	<div>

		<h1>Adicionar matéria</h1>
		
		<?php
			
			echo $this->Form->create('Post');
			echo $this->Form->input('title', array('label'=>'Título'));
			echo $this->Form->input('content', array('label'=>'Conteúdo', 'rows' => '3'));
			echo $this->Form->input('section', array(
			'label'=>'Seção:',
			'options' => array('games' => 'Games', 'quadrinhos' => 'Quadrinhos', 'música' => 'Música', 'séries' => 'Séries e TV')
			));
			echo $this->Form->end('Postar');
			
		?>

	</div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    
  </div><!-- box-footer -->
</div><!-- /.box -->