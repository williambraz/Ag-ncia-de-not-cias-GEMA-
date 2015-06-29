<!-- File: /app/View/Posts/view.ctp -->

<?php echo $this->element('menu') ?>

<div class="col-xs-12">
    <p>Logado como: 
        <?php 
            echo $this->session->read('Auth.User.username').' - ';
            echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));
        ;?>
    </p>
</div>

<div class="col-xs-12">

	<h1><?php echo $post['Post']['title']?></h1>

	<p><small>Created: <?php echo $post['Post']['created']?></small></p>

	<p><?php echo $post['Post']['content']?></p>

</div>

<div class="col-xs-12">

	<?php if (!empty($post['Comment'])) echo '<h2> Comentários </h2>'; ?>

    <?php foreach ($post['Comment'] as $comment): ?>

        <div class="post well">
            <p><?php echo $comment['User']['username'] . ' - ' . $comment['created'];?></h1>
            <p><?php echo $comment['content']; ?></p>
        </div>

    <?php endforeach; ?>

</div>

<div class="col-xs-12">

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

<button id='teste'>Teste</button>

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
</script>
	