<?php
/**
 * @var \App\Kernel\View\IView $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Добавить категорию</h2>    
    <form method="post">
        <?php
        $view->inputAndError('title', 'Заголовок', value: 'old');
        ?>             

        <textarea class="<?= $view->setInvalid('desc') ?>" name="desc" rows="4" placeholder="Описание" value="old_desc"></textarea>
        <?php $view->error('desc'); ?>        

        <button type="submit" class="btn">Добавить</button>
    </form>
</section>

<?php $view->component('end'); ?>