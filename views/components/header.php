<?php
/** @var \App\Kernel\Auth\IAuth $auth
 * @var \App\Kernel\Auth\User $user
 * @var \App\Kernel\Storage\Storage $storage
 */
?>

<header>  
    <nav class="container">
        <a href="/home" class="nav__logo">BLOG</a>
        <ul class="nav__items">
            <li><a href="/about">О нас</a></li>
            <li><a href="/services">Сервисы</a></li>
            <li><a href="/contacts">Контакты</a></li>
            <?php if (!$auth->check()) { ?>
                <li><a href="/signin">Войти</a></li>                
            <?php } ?>
        </ul>
        
        <div class="nav__icons">
            <button class="open__nav-btn"></button>
            <button class="close__nav-btn"></button>
            <div class="nav__profile">
                <div class="avatar">
                    <?php if ($auth->check()) {
                        if (!empty($user->avatarPath())) { ?>
                            <img src="<?= $storage->url($user->avatarPath()) ?>" alt="Аватар">
                        <?php }
                        else { ?>
                            <img src="/assets/img/avatars/avatar1.png" alt="Аватар">
                        <?php } 
                    }
                    else { ?>
                        <img src="/assets/img/avatars/avatar1.png" alt="Аватар">
                    <?php } ?>
                </div>
                <ul>
                    <?php if (!$auth->check()) { ?>
                        <li><a href="/signin">Войти</a></li>                
                        <li><a href="/signup">Зарегистрироваться</a></li>
                    <?php } ?>
                    <?php if ($auth->check()) { ?>
                        <li><a href="/dashboard">Панель</a></li>
                        <li><a href="/user/edit">Изменить данные</a></li>
                    <?php } ?>
                    <li><a href="/logout">Выйти</a></li>
                </ul>
            </div>
        </div>           
    </nav>
</header>