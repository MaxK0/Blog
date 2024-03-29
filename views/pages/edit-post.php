<?php
/**
 * @var \App\Kernel\View\IView $view
 * @var \App\Models\Post $post
 * @var array<\App\Models\Category> $categories
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить пост</h2>    
    <form method="post" enctype="multipart/form-data">
        <?php $view->inputAndError('title', 'Заголовок', value: $post->title()); ?>

        <select name="category">
            <?php foreach ($categories as $category) { ?>
                <option value="<?= $category->id() ?>" <?= in_array($category, $post->categories()) ? 'selected' : '' ?> ><?= $category->title() ?></option>
            <?php } ?>
        </select>
        <?php $view->error('category'); ?>

        <textarea class="<?= $view->setInvalid('text') ?>" name="text" rows="10" placeholder="Текст поста"><?= $post->body() ?></textarea>
        <?php $view->error('text'); ?>


        <?php if ($auth->check() && $user->isAdmin()) { ?>
            <div class="form__control inline">
                <?php $view->inputAndError('isFeatured', type: 'checkbox', value: '1'); ?>
                <label for="isFeatured">Избранное</label>
            </div>
            <?php $view->error('isFeatured'); ?>
        <?php } ?>

        <div class="form__control">
            <label for="thumbnail">Добавить картинку</label>
            <?php $view->inputAndError('thumbnail', type: 'file'); ?>
        </div>
        <?php $view->error('thumbnail'); ?>

        <button type="submit" class="btn">Изменить</button>
    </form>
</section>

<?php $view->component('end'); ?>