<?php
/**
 * @var \App\Kernel\View\IView $view
 * @var \App\Models\Category $category
 * @var array<\App\Models\Post> $posts
 */

$view->component('start');
?>

<section class="section__title">
    <h2><?= $category->title() ?></h2>
</section>

<!-- <========================== Посты  ==========================> -->
<section class="posts container">
    <?php foreach ($posts as $post) { 
        if (!empty($post)) { 
            $text = explode("\r\n", $post->body());
            ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="<?= $storage->url($post->thumbnail()) ?>" alt="Фото для блога">
                </div>
                <div class="post__info">
                    <?php foreach ($post->categories() as $category) { ?>
                        <a class="category__button" href="/category?id=<?= $category->id() ?>"><?= $category->title() ?></a>
                    <?php } ?>
                    <h2 class="post__title"><a href="/post?id=<?= $post->id() ?>"><?= $post->title() ?></a></h2>
                    <p class="post__body"><?= mb_strimwidth($text[0], 0, 400, trim_marker: '...') ?></p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <?php if (!empty($post->author()->avatarPath())) { ?>
                                <img src="<?= $storage->url($post->author()->avatarPath()) ?>" alt="avatar">
                            <?php } else { ?>
                                <img src="/assets/img/avatars/avatar1.png" alt="avatar">
                            <?php } ?>
                        </div>
                        <div class="post__author-info">
                            <h5>Автор: <?= $post->author()->surname() . ' ' . $post->author()->name() ?></h5>
                            <small><?= $post->dateTime() ?></small> <!-- TODO: Июнь 10, 2023 - 07:83 -->
                        </div>
                    </div>
                </div>
            </article>
    <?php }
    } ?>
</section>
<!-- <========================== Конец постов  ==========================> -->

<?php $view->component('end'); ?>