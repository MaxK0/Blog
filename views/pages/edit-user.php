<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить пользователя</h2>        
    <form action="" enctype="multipart/form-data">
        <input type="text" placeholder="Имя">
        <input type="text" placeholder="Фамилия">
        <input type="text" placeholder="Никнейм">
        <input type="text" placeholder="Эл. почта">
        <input type="text" placeholder="Пароль">
        <input type="text" placeholder="Повтор пароля">            
        <div class="form__control">
            <label for="avatar">Аватар</label>
            <input type="file" id="avatar">
        </div>
        <button type="submit" class="btn">Изменить пользователя</button>
    </form>
</section>

<?php $view->component('end'); ?>