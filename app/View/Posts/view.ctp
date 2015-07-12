<!-- File: /app/View/Posts/view.ctp -->

<div class="clear"></div>

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Conteúdo da Matéria</h3>
  </div><!-- /.box-header -->
  <div class="box-body">

    <div class='basic_post'>
        <div class='basic_section'>
            <span><strong>
                <?php if ($post['Post']['section'] == 'games') : ?>
                    <i class="fa fa-gamepad"></i>
                <?php elseif ($post['Post']['section'] == 'musica') : ?>
                    <i class="fa fa-volume-up"></i>
                <?php elseif ($post['Post']['section'] == 'series') : ?>
                    <i class="fa fa-film"></i>
                <?php elseif ($post['Post']['section'] == 'quadrinhos') : ?>
                    <i class="fa fa-file"></i>
                <?php endif ?>
                <?php echo ' ' . $post['Post']['section']; ?>
            </strong></span>
        </div>
        <div class='basic_content'>
            <h1><?php echo $post['Post']['title']; ?></h1> 
            <p><?php echo $post['Post']['content']; ?></p>
        </div>
    </div>

    <div>

        <?php 
            if ($this->session->read('Auth.User.role') == "gerente"){
                if ($post['Post']['state'] == "proposta"){
                    if (!empty($post['Post']['reviser_id'])){
                        
                        echo "<h2>Aprovação do artigo</h2>";
                        
                        echo $this->Html->link('Aprovar',array('controller' => 'posts', 'action' => 'approve', '?' => array('id' => $post['Post']['id'])),array('class' => 'btn btn-success')); 
                        echo $this->Html->link('Arquivar',array('controller' => 'posts', 'action' => 'archive', '?' => array('id' => $post['Post']['id'])),array('class' => 'btn btn-danger')); 
                    }
                    else{
                        echo "<h2>O artigo necessita de um revisor</h2>"; 
                    }
                }
                else if ($post['Post']['state'] == "arquivada"){
                    echo "<h2>Este artigo foi arquivado</h2>";
                }
                else{
                    echo "<h2>Este artigo foi aprovado</h2>";
                }
            }
            else if ($this->session->read('Auth.User.role') == "publicador"){
                if ($post['Post']['state'] == "aprovada"){
                    echo $this->Html->link('Publicar',array('controller' => 'posts', 'action' => 'publish', '?' => array('id' => $post['Post']['id'])),array('class' => 'btn btn-success')); 
                }
            }
            
        ?>

    </div>

    <div class='basic_post'>
        <div class='basic_section comments'>
            <span><strong>
                <?php echo 'Adicionar Comentário'; ?>
            </strong></span>
        </div>
        <div class='basic_content'>
            <?php
                //debug($post);
                echo $this->Form->Create('Comment',array('type'=>'post'));
                echo $this->Form->hidden('post_id',array('value'=>$post['Post']['id']));
                echo $this->Form->hidden('user_id',array('value'=>$this->session->read('Auth.User.id')));
                echo $this->Form->Input('content',array('label'=>'Escrever comentário:','rows'=>'3'));
                echo $this->Form->End('Comentar');
            ?>
        </div>
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
                        <small><?php $this->Time->format('d/m/Y', $comment['created'],null,null);?></small>
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

<script>
$(document).ready(function() {	
	/*$('#teste').click(function(event) {
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
	});*/
    $('#CommentContent').editable({inlineMode: false});   
});
</script>
	