<?php
/**
 * @var \App\Kernel\View\IView $view
 * @var \App\Models\Post $post
 * @var \App\Kernel\Storage\IStorage $storage
 */

$view->component('start');
?>

<section class="singlepost container">
    <h2><?= $post->title() ?></h2>
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
            <small><?= $post->dateTime() ?></small>
        </div>
    </div>
    <div class="singlepost__thumnail">
        <img src="<?= $storage->url($post->thumbnail()) ?>" alt="Пост">
    </div>
    <div class="singlepost__text">
        <p>
            <?= $post->body() ?>
        </p>                 
    </div>
</section>

<?php $view->component('end'); ?>