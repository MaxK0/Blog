<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Добавить категорию</h2>
    <div class="alert__message error">
        <p>Сообщение об ошибке</p>
    </div>
    <form method="post">
        <input name="title" type="text" placeholder="Заголовок">            
        <textarea name="desc" rows="4" placeholder="Описание"></textarea>
        <button type="submit" class="btn">Добавить</button>
    </form>
</section>

<?php $view->component('end'); ?>