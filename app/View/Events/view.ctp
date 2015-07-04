<!-- File: /app/View/Events/index.ctp -->

<?php echo $this->element('menu') ?>

<div class="clear"></div>

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Eventos</h3>
  </div><!-- /.box-header -->
  <div class="box-body">

    <h2><?php echo $events[0]['Post']['title']; ?></h2>

    <?php foreach ($events as $event): ?>
        <div class="post well">
            <p><?php echo $event['User']['username']; ?></p> 
            <p><?php echo $event['Event']['state']; ?></p>
            <p><?php echo $event['Event']['created']; ?></p>
        </div>
    <?php endforeach; ?>

  </div><!-- /.box-body -->
  <div class="box-footer">
    
  </div><!-- box-footer -->
</div><!-- /.box -->