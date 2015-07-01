<!-- File: /app/View/Posts/view.ctp -->

<?php echo $this->element('menu') ?>

<div class="clear"></div>

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Conteúdo da Matéria</h3>
  </div><!-- /.box-header -->
  <div class="box-body">

    <div>

    	<h1><?php echo $post['Post']['title']?></h1>

    	<p><small>Created: <?php echo $post['Post']['created']?></small></p>

    	<p><?php echo $post['Post']['content']?></p>

    </div>

    <div>

        <?php 
            if ($post['Post']['state'] == "proposta"){
                echo "<h2>Aprovação do artigo</h2>";
                if ($this->session->read('Auth.User.role') == "gerente"){
                    echo $this->Html->link('Aprovar',array('controller' => 'posts', 'action' => 'approve', '?' => array('id' => $post['Post']['id'])),array('class' => 'btn btn-success')); 
                    echo $this->Html->link('Arquivar',array('controller' => 'posts', 'action' => 'archive', '?' => array('id' => $post['Post']['id'])),array('class' => 'btn btn-danger')); 
                 }
            }
            else if ($post['Post']['state'] == "arquivada"){
                echo "<h2>Este artigo foi arquivado</h2>";
            }
            else{
                echo "<h2>Este artigo foi aprovado</h2>";
            }
            
        ?>

    </div>


    <div>

    	<?php if (!empty($post['Comment'])) echo '<h2> Comentários </h2>'; ?>

        <?php foreach ($post['Comment'] as $comment): ?>

            <div class="post well">
                <p><?php echo $comment['User']['username'] . ' - ' . $comment['created'];?></h1>
                <p><?php echo $comment['content']; ?></p>
            </div>

        <?php endforeach; ?>

    </div>

    <div>

    	<h2> Adicionar Comentário </h2>

    	<?php
    		//debug($post);
    		echo $this->Form->Create('Comment',array('type'=>'post'));
    		echo $this->Form->hidden('post_id',array('value'=>$post['Post']['id']));
    		echo $this->Form->hidden('user_id',array('value'=>$this->session->read('Auth.User.id')));
    		echo $this->Form->Input('content',array('label'=>'Escrever comentário:','rows'=>'3'));
    		echo $this->Form->End('Comentar');
    	?>

    <div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    
  </div><!-- box-footer -->
</div><!-- /.box -->

<!--<button id='teste'>Teste</button>

<script>
$(document).ready(function() {	
	$('#teste').click(function(event) {
		$.ajax({
            type: "POST",
            url: '/agencia/posts/comment',
            data: {name:"ravi",age:"31"},
            success: function (data,textStatus){
            	alert(data);
            	//debug(data);
				//$("h2").html(data);
            }
        });
	});
});
</script>-->
	