<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Добавить категорию</h2>    
    <form method="post">
        <input name="title" type="text" placeholder="Заголовок">    
        <?php $view->errorInForm('title'); ?>        

        <textarea name="desc" rows="4" placeholder="Описание"></textarea>
        <?php $view->errorInForm('desc'); ?>        
        
        <button type="submit" class="btn">Добавить</button>
    </form>
</section>

<?php $view->component('end'); ?>