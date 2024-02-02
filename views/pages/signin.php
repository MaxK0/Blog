<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Войти</h2>    
    <form method="post">
        <input type="text" name="login" placeholder="Никнейм или эл. почта">       
        <?php $view->errorInForm('login'); ?>
        
        <input type="text" name="password" placeholder="Пароль">
        <?php $view->errorInForm('password'); ?>

        <button type="submit" class="btn">Войти</button>
        <small class="link_to_sign">У вас нет аккаунта? <a href="/signup">Зарегистрироваться</a></small>
    </form>
</section>

<?php $view->component('end'); ?>