<!-- File: /app/View/Posts/home_view.ctp -->

<div class="col-xs-12">

    <div class="col-md-3 hidden-xs hidden-sm">

        <?php echo $this->element('block_posts') ?>

    </div>

    <div class="col-md-9 col-sm-12">

        <div class='basic_post'>
            <div class='basic_section'>
                
                <span><strong>
                <?php if ($post['Post']['section'] == 'games') : ?>
                    <i class="fa fa-gamepad"></i>
                <?php echo "Games"; ?>
                <?php elseif ($post['Post']['section'] == 'musica') : ?>
                    <i class="fa fa-music"></i>
                <?php echo "Música"; ?>
                <?php elseif ($post['Post']['section'] == 'series') : ?>
                    <i class="fa fa-film"></i>
                <?php echo "Séries e TV"; ?>
                <?php elseif ($post['Post']['section'] == 'quadrinhos') : ?>
                    <i class="fa fa-comment"></i>
                <?php echo "Quadrinhos"; ?>
                <?php endif ?>
                </strong></span>
            </div>
            <div class='basic_content'>
                <h1><?php echo $post['Post']['title']; ?></h1> 
                <p><?php echo $post['Post']['content']; ?></p>
            </div>
            <div class='basic_footer'>
                <small><?php echo $post['Journalist']['name'] . ' - ' . $this->Time->format('d/m/Y', $post['Post']['created'],null,null);?></small>
            </div>
        </div>

    </div>

</div>