<?php

/**
 * @var \App\Kernel\View\IView $view
 * @var \App\Kernel\Auth\IAuth $auth
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить пользователя</h2>
    <form method="post" enctype="multipart/form-data">
        <?php

        $name = $user->name();
        $surname = $user->surname();
        $nick = $user->nick();
        $email = $user->email();

        $view->inputAndError('name', 'Имя', value: $name);
        $view->inputAndError('surname', 'Фамилия', value: $surname);
        $view->inputAndError('nick', 'Ник', value: $nick);
        $view->inputAndError('email', 'Email', value: $email);
        $view->inputAndError('password', 'Пароль', 'password');
        $view->inputAndError('passwordRepeat', 'Повтор пароля', 'password');

        ?>

        <div class="form__control">
            <label for="avatar">Аватар</label>
            <?php $view->input('avatar', 'Аватар', 'file'); ?>
        </div>
        <?php $view->error('avatar'); ?>

        <button type="submit" class="btn">Изменить</button>
    </form>
</section>

<?php $view->component('end'); ?>