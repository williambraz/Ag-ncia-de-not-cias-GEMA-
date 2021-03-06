<!-- File: /app/View/Posts/edit.ctp -->

<div class="clear"></div>

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Edição da Matéria</h3>
  </div><!-- /.box-header -->
  <div class="box-body">

    <div>

    	<?php
    	    echo $this->Form->create('Post', array('action' => 'edit'));
    	    echo $this->Form->input('title', array('label' => 'Título'));
    	    echo $this->Form->input('content', array('label' => 'Conteúdo','rows' => '3'));
    	    echo $this->Form->input('id', array('type' => 'hidden'));
    	    echo $this->Form->end('Salvar');
    	?>

    </div>

  	<?php if (!empty($post['Comment'])): ?>
      <div class='basic_post'>
          <div class='basic_section comments'>
              <span><strong>Comentários</strong></span>
          </div>
          <div class='basic_content'>
              <?php foreach ($post['Comment'] as $comment): ?>

                  <div class="post well">
                      <strong><?php echo $comment['User']['username'];?></strong></br>
                      <small><?php echo $this->Time->format('d/m/Y - H:m:s', $comment['created'],null,null);?></small>
                      <p><?php echo $comment['content']; ?></p>
                  </div>

              <?php endforeach; ?>
          </div>
      </div>
    <?php endif; ?>

  </div><!-- /.box-body -->
  <div class="box-footer center">
    <?php echo $this->Html->link('Voltar', array('controller' => 'posts', 'action' => 'index'),array('class'=>'btn btn-primary'));?>
  </div><!-- box-footer -->
</div><!-- /.box -->

<script type="text/javascript">
$(document).ready( function() {
          
    $('select').select2({ width: '100%' }); 
    $('#PostContent').editable({inlineMode: false, placeholder: 'Digite aqui o seu texto', height:200, imageUploadURL: 'http://www.williambraz.com.br/upload_image.php',  imageErrorCallback: function (data) {
        console.log(data);
      }
    }); 
                    
});
</script>