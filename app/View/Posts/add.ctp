<!-- File: /app/View/Posts/add.ctp -->

<div class="clear"></div>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Adicionar Matéria</h3>
	</div><!-- /.box-header -->
	<div class="box-body">

	<div>
		
		<?php
			
			echo $this->Form->create('Post');
			echo $this->Form->input('title', array('label'=>'Título'));
			echo $this->Form->input('content', array('label'=>'Conteúdo', 'rows' => '10', 'required'=>'false'));
			echo $this->Form->input('section', array(
			'label'=>'Seção:',
			'options' => array('games' => 'Games', 'quadrinhos' => 'Quadrinhos', 'musica' => 'Música', 'series' => 'Séries e TV')
			));
			echo $this->Form->end('Postar');
			
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
    $('#PostContent').editable({inlineMode: false});              
       
  });
</script>