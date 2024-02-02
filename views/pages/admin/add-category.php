<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Добавить категорию</h2>    
    <form method="post">
        <?php
        $view->inputAndError('title', 'Заголовок');
        ?>             

        <textarea class="<?= $view->setInvalid('desc') ?>" name="desc" rows="4" placeholder="Описание"></textarea>
        <?php $view->error('desc'); ?>        

        <button type="submit" class="btn">Добавить</button>
    </form>
</section>

<?php $view->component('end'); ?>