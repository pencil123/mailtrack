<h2><?php echo $title; ?><h2/>

<?php foreach ($news as $news_item): ?>

    <h3><?php echo $news_item['id']; ?></h3>
    <div class="main">
        <?php echo $news_item['title']; ?>
    </div>
    <p><a href="<?php echo site_url('pages/'.$news_item['imgpath']); ?>">View article</a></p>

<?php endforeach; ?>