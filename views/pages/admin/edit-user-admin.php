<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить пользователя</h2>        
    <form method="post" enctype="multipart/form-data">
        <?php 
        $view->inputAndError('name', 'Имя'); 
        $view->inputAndError('surname', 'Фамилия'); 
        $view->inputAndError('nick', 'Ник'); 
        $view->inputAndError('email', 'Email'); 
        $view->inputAndError('password', 'Пароль'); 
        $view->inputAndError('passwordRepeat', 'Повтор пароля'); 
        ?>

        <select name="isAdmin">
            <option value="0">Автор</option>
            <option value="1">Админ</option>
        </select>
        <?php $view->error('isAdmin'); ?>

        <div class="form__control">
            <label for="avatar">Аватар</label>
            <?php $view->input('avatar', 'Аватар', 'file'); ?>
        </div>
        <?php $view->error('avatar'); ?>

        <button type="submit" class="btn">Изменить</button>
    </form>
</section>

<?php $veiw->component('end'); ?>