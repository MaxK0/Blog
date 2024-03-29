<?php

/**
 * @var \App\Kernel\View\IView $view
 * @var \App\Kernel\Auth\IAuth $auth
 * @var \App\Kernel\Session\Session $session
 * @var array<\App\Models\Category> $categories
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Добавить пост</h2>
    <form method="post" enctype="multipart/form-data">
        <?php $view->inputAndError('title', 'Заголовок'); ?>

        <select name="category">
            <?php foreach ($categories as $category) { ?>
                <option value="<?= $category->id() ?>"><?= $category->title() ?></option>
            <?php } ?>
        </select>
        <?php $view->error('category'); ?>

        <textarea class="<?= $view->setInvalid('text') ?>" name="text" rows="10" placeholder="Текст поста" value="<?= $session->getFlash('old_text') ?? '' ?>"></textarea>
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

        <button type="submit" class="btn">Добавить</button>
    </form>
</section>

<?php $view->component('end'); ?>