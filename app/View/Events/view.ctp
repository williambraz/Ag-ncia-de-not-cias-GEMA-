<!-- File: /app/View/Events/index.ctp -->

<div class="clear"></div>

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Eventos</h3>
  </div><!-- /.box-header -->
  <div class="box-body">

    <div class='basic_post'>
      <div class='basic_section events'>
          <span><strong>
          <?php echo 'Matéria: ' . $events[0]['Post']['title']; ?>
          </strong></span>
      </div>
      <div class='basic_content'>
          <?php foreach ($events as $event): ?>
              <div class="post well">
                <strong><?php echo $event['User']['username'];?></strong></br>
                <small><?php echo $this->Time->format('d/m/Y - H:m:s', $event['Event']['created'],null,null);?></small>
                <p><?php echo 'Estado atualizado : ' . $event['Event']['state']; ?></p>
              </div>
          <?php endforeach; ?>
      </div>
      <div class='basic_footer'>
          
      </div>
    </div>

  </div><!-- /.box-body -->
  <div class="box-footer center">
    <?php echo $this->Html->link('Voltar', array('controller' => 'posts', 'action' => 'index'),array('class'=>'btn btn-primary'));?>
  </div><!-- box-footer -->
</div><!-- /.box -->