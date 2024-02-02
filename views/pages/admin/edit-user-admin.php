<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить пользователя</h2>        
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="surname" placeholder="Фамилия">
        <input type="text" name="nick" placeholder="Никнейм">
        <input type="text" name="email" placeholder="Эл. почта">
        <input type="text" name="password" placeholder="Пароль">
        <input type="text" name="passwordRepeat" placeholder="Повтор пароля">
        <select name="isAdmin">
            <option value="0">Автор</option>
            <option value="1">Админ</option>
        </select>
        <div class="form__control">
            <label for="avatar">Аватар</label>
            <input type="file" name="avatar" id="avatar">
        </div>
        <button type="submit" class="btn">Изменить пользователя</button>
    </form>
</section>

<?php $veiw->component('end'); ?>