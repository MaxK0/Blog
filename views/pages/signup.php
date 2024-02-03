<?php
/**
 * @var \App\Kernel\View\IView $view
 * @var \App\Kernel\Session\ISession $session
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Регистрация</h2>
    <!-- <div class="alert__message access">
        <p>Сообщение об ошибке</p>
    </div> -->
    <form method="post" enctype="multipart/form-data">
        <?php 
        $view->inputAndError('name', 'Имя'); 
        $view->inputAndError('surname', 'Фамилия'); 
        $view->inputAndError('nick', 'Ник'); 
        $view->inputAndError('email', 'Email'); 
        $view->inputAndError('password', 'Пароль'); 
        $view->inputAndError('passwordRepeat', 'Повтор пароля'); 
        ?>
        
        <div class="form__control">
            <label for="avatar">Аватар</label>
            <?php $view->input('avatar', 'Аватар', 'file'); ?>
        </div>
        <?php $view->error('avatar'); ?>

        <button type="submit" class="btn">Зарегистрироваться</button>
        <small class="link_to_sign">Уже есть аккаунт? <a href="/signin">Войти</a></small>
    </form>
</section>

<?php $view->component('end'); ?>