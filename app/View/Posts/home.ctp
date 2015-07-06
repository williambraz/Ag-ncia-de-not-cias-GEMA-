<!-- File: /app/View/Posts/home.ctp -->

<div class="col-xs-12">

    <div class="col-md-3 hidden-xs hidden-sm">
        <div class='well'>

            <?php foreach ($posts as $post): ?>
                <div class='home_post'>
                    <div class='home_section'>
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
                        <?php echo ' ' . $post['Post']['title']; ?></br>
                         <small><?php echo $post['Post']['created'];?></small>
                        </strong></span>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>

    <div class="col-md-9 col-sm-12">

        <?php foreach ($posts as $post): ?>
            <div class='home_post'>
                <div class='home_section'>
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

</div>