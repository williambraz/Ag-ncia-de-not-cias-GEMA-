<!-- File: /app/View/Posts/section.ctp -->

<div class="col-xs-12">

    <?php foreach ($posts as $post): ?>
        <div class='home_post'>
            <div class='home_section'>
                <span><strong>
                <?php if ($post['Post']['section'] == 'games') : ?>
                    <i class="fa fa-gamepad"></i> 
                    Games
                <?php elseif ($post['Post']['section'] == 'musica') : ?>
                    <i class="fa fa-volume-up"></i>
                    Música
                <?php elseif ($post['Post']['section'] == 'series') : ?>
                    <i class="fa fa-film"></i>
                    Séries e TV
                <?php elseif ($post['Post']['section'] == 'quadrinhos') : ?>
                    <i class="fa fa-file"></i>
                    Quadrinhos
                <?php endif ?>
                </strong></span>
            </div>
            <div class='home_content'>
                <h1><?php echo $post['Post']['title']; ?></h1> 
                <p><?php echo $post['Post']['content']; ?></p>
            </div>
            <div class='home_footer'>
                <small><?php echo $post['Post']['created'] . ' - ' . $post['Journalist']['name']; ?></small>
            </div>
        </div>
    <?php endforeach; ?>

</div>