<?php
/**
 * @var \App\Kernel\View\IView $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Войти</h2>    
    <form method="post">
        <?php
        $view->inputAndError('login', 'Никнейм или эл. почта');
        $view->inputAndError('password', 'Пароль');
        ?>       

        <button type="submit" class="btn">Войти</button>
        <small class="link_to_sign">У вас нет аккаунта? <a href="/signup">Зарегистрироваться</a></small>
    </form>
</section>

<?php $view->component('end'); ?>