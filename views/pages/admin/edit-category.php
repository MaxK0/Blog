<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить категорию</h2>        
    <form method="post">
        <input type="text" name="title" placeholder="Заголовок">       
        <?php $view->errorInForm('title') ?>     

        <textarea name="desc" rows="4" placeholder="Описание"></textarea>
        <?php $view->errorInForm('desc') ?>     
        
        <button type="submit" class="btn">Изменить категорию</button>
    </form>
</section>

<?php $view->component('end'); ?>