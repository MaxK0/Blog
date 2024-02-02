<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Войти</h2>
    <div class="alert__message error">
        <p>Сообщение об ошибке</p>
    </div>
    <form action="">
        <input type="text" placeholder="Никнейм или эл. почта">            
        <input type="text" placeholder="Пароль">
        <button type="submit" class="btn">Войти</button>
        <small>У вас нет аккаунта? <a href="/signup">Зарегистрироваться</a></small>
    </form>
</section>

<?php $view->component('end'); ?>