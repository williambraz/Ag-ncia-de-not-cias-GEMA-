<!-- File: /app/View/Posts/home.ctp -->

<div class="titulo text-center col-xs-12">
    <h2>Home do site</h2>
</div>

<div class="col-xs-12">

        <?php foreach ($posts as $post): ?>

            <div class="post well">
                <h1><?php echo $post['Post']['title']; ?></h1>
                <small><?php echo $post['Journalist']['name']; ?> - <?php echo $post['Post']['created']; ?></small>
                <p><?php echo $post['Post']['section']; ?></p>
                <p><?php echo $post['Post']['content']; ?></p>
            </div>

        <?php endforeach; ?>

</div>