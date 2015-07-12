<div class='block_posts'>
    <?php if (!empty($postsBlock)) : ?>
        <strong> Últimos Posts </strong>
    <?php endif; ?>
    <div>
        <?php foreach ($postsBlock as $post): ?>
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
                    <?php echo $post['Post']['title']; ?></br>
                    <small><?php echo $post['Journalist']['name']; ?></small></br>
                    <small><?php $data = new DateTime($post['Post']['created']); echo $data->format('d/m/Y'); ?></small>
                    </strong></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>