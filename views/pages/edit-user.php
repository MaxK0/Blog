<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Добавить пользователя</h2>    
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Имя">
        <?php $view->errorInForm('name'); ?>
        
        <input type="text" name="surname" placeholder="Фамилия">
        <?php $view->errorInForm('surname'); ?>

        <input type="text" name="nick" placeholder="Никнейм">
        <?php $view->errorInForm('nick'); ?>

        <input type="text" name="email" placeholder="Эл. почта">
        <?php $view->errorInForm('email'); ?>

        <input type="text" name="password" placeholder="Пароль">
        <?php $view->errorInForm('password'); ?>

        <input type="text" name="passwordRepeat" placeholder="Повтор пароля">        
        <?php $view->errorInForm('passwordRepeat'); ?>

        <div class="form__control">
            <label for="avatar">Аватар</label>
            <input type="file" name="avatar" id="avatar">
        </div>
        <?php $view->errorInForm('avatar'); ?>

        <button type="submit" class="btn">Добавить пользователя</button>
    </form>
</section>

<?php $view->component('end'); ?>