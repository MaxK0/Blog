<?php

/**
 * @var \App\Kernel\View\IView $view
 * @var array<\App\Models\Post> $posts
 * @var \App\Kernel\Storage\Storage $storage
 * @var \App\Models\Category $category
 * @var array<\App\Models\Category> $categories
 */

$view->component('start');
?>

<!-- <========================== Рекомендация ==========================> -->
<section class="featured container">

    <?php 
    $lengthPosts = count($posts) - 1;
    for ($i = $lengthPosts; $i >= 0; $i--) {
        
        $post = $posts[$i];

        $text = explode("\r\n", $post->body());

        if ($post->isFeatured()) { ?>
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
            <?php break; ?>
    <?php }
    } ?>
</section>
<!-- <========================== Конец рекомендации  ==========================> -->

<!-- <========================== Поиск ==========================> -->
<section class="search__bar">
    <form class="container search__bar-container">
        <div>
            <img src="/assets/img/icons/search.png" alt="">
            <input type="search" name="search" placeholder="Найти...">
        </div>
        <button type="submit" class="btn">Искать</button>
    </form>
</section>
<!-- <========================== Конец поиска ==========================> -->

<!-- <========================== Посты  ==========================> -->
<section class="posts container">
    <?php
    for ($i = $lengthPosts; $i >= 0; $i--) { 

        $post = $posts[$i];

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
    <?php } ?>
</section>
<!-- <========================== Конец постов  ==========================> -->

<!-- <========================== Категории  ==========================> -->
<section class="category__buttons container">
    <div class="category__buttons-container">
        <?php foreach ($categories as $category) { ?>
            <a href="/category?id=<?= $category->id() ?>" class="category__button"><?= $category->title() ?></a>
        <?php } ?>
    </div>
</section>
<!-- <========================== Конец категорий  ==========================> -->

<?php $view->component('end');
