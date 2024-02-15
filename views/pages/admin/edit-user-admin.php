<?php
/**
 * @var \App\Kernel\View\IView $view
 * @var \App\Kernel\Auth\User $userEdit
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить пользователя</h2>        
    <form method="post" enctype="multipart/form-data">
        <?php 
        $view->inputAndError('name', 'Имя', value: $userEdit->name()); 
        $view->inputAndError('surname', 'Фамилия', value: $userEdit->surname()); 
        $view->inputAndError('nick', 'Ник', value: $userEdit->nick()); 
        $view->inputAndError('email', 'Email', value: $userEdit->email()); 
        $view->inputAndError('password', 'Пароль', 'password'); 
        $view->inputAndError('passwordRepeat', 'Повтор пароля', 'password'); 
        ?>

        <select name="isAdmin">
            <option value="0" selected>Автор</option>
            <option value="1" <?= $userEdit->isAdmin() ? 'selected' : '' ?>>Админ</option>
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