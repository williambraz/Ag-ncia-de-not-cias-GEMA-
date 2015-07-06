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
			echo $this->Form->input('content', array('label'=>'Conteúdo', 'rows' => '3'));
			echo $this->Form->input('section', array(
			'label'=>'Seção:',
			'options' => array('games' => 'games', 'quadrinhos' => 'quadrinhos', 'música' => 'musica', 'séries' => 'series')
			));
			echo $this->Form->end('Postar');
			
		?>

	</div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    
  </div><!-- box-footer -->
</div><!-- /.box -->

<script type="text/javascript">
  $(document).ready( function() {
          
      $('#PostContent').redactor({ 
          focus: true
      });            
       
  });
</script>