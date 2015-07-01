<!-- File: /app/View/Posts/edit.ctp -->

<?php echo $this->element('menu') ?>

<div class="clear"></div>

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Edição da Matéria</h3>
  </div><!-- /.box-header -->
  <div class="box-body">

    <div>

    	<?php
    	    echo $this->Form->create('Post', array('action' => 'edit'));
    	    echo $this->Form->input('title');
    	    echo $this->Form->input('content', array('rows' => '3'));
    	    echo $this->Form->input('id', array('type' => 'hidden'));
    	    echo $this->Form->end('Salvar');
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

  </div><!-- /.box-body -->
  <div class="box-footer">
    
  </div><!-- box-footer -->
</div><!-- /.box -->