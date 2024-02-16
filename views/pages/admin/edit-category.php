<?php
/**
 * @var \App\Kernel\View\IView $view
 * @var \App\Models\Category $category
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить категорию</h2>        
    <form method="post">
        <?php
        $view->inputAndError('title', 'Заголовок', value: $category->title());
        ?>             

        <textarea class="<?= $view->setInvalid('desc') ?>" name="desc" rows="4" placeholder="Описание"><?= $category->description() ?></textarea>
        <?php $view->error('desc'); ?>        

        <button type="submit" class="btn">Изменить</button>
    </form>
</section>

<?php $view->component('end'); ?>