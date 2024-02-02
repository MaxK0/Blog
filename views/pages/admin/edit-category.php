<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить категорию</h2>        
    <form method="post">
        <?php
        $view->inputAndError('title', 'Заголовок');
        ?>             

        <textarea class="<?= $view->setInvalid('desc') ?>" name="desc" rows="4" placeholder="Описание"></textarea>
        <?php $view->error('desc'); ?>        

        <button type="submit" class="btn">Изменить</button>
    </form>
</section>

<?php $view->component('end'); ?>