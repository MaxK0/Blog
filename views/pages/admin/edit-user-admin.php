<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- <========================== Шапка ==========================> -->
    <header>
        <nav class="container">
            <a href="index.html" class="nav__logo">BLOG</a>
            <ul class="nav__items">
                <li><a href="blog.html">Блог</a></li>
                <li><a href="about.html">О нас</a></li>
                <li><a href="services.html">Сервисы</a></li>
                <li><a href="contact.html">Контакты</a></li>
                <li><a href="signin.html">Войти</a></li>
            </ul>

            <div class="nav__icons">
                <button class="open__nav-btn"></button>
                <button class="close__nav-btn"></button>
                <div class="nav__profile">
                    <div class="avatar">
                        <img src="assets/img/avatars/avatar1.png" alt="Аватар">
                    </div>
                    <ul>
                        <li><a href="dashboard.html">Панель</a></li>
                        <li><a href="logout.html">Выйти</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- <========================== Конец шапки ==========================> -->

    <section class="form__section container">
        <h2>Изменить пользователя</h2>        
        <form action="" enctype="multipart/form-data">
            <input type="text" placeholder="Имя">
            <input type="text" placeholder="Фамилия">
            <input type="text" placeholder="Никнейм">
            <input type="text" placeholder="Эл. почта">
            <input type="text" placeholder="Пароль">
            <input type="text" placeholder="Повтор пароля">
            <select>
                <option value="0">Автор</option>
                <option value="1">Админ</option>
            </select>
            <div class="form__control">
                <label for="avatar">Аватар</label>
                <input type="file" id="avatar">
            </div>
            <button type="submit" class="btn">Изменить пользователя</button>
        </form>
    </section>

    <!-- <========================== Подвал  ==========================> -->
    <footer>
        <div class="container">
            <div class="footer__socials">
                <a href="*" class="link-button" target="_blank"><img src="assets/img/icons/youtube.png" alt=""></a>
                <a href="*" class="link-button" target="_blank"><img src="assets/img/icons/facebook.png" alt=""></a>
                <a href="*" class="link-button" target="_blank"><img src="assets/img/icons/linkedin.png" alt=""></a>
                <a href="*" class="link-button" target="_blank"><img src="assets/img/icons/twitter.png" alt=""></a>
                <a href="*" class="link-button" target="_blank"><img src="assets/img/icons/instagram.png" alt=""></a>
            </div>
            <nav class="footer__nav">
                <div class="couple__nav">
                    <div>
                        <h4>Категории</h4>
                        <ul>
                            <li><a href="*">Природа</a></li>
                            <li><a href="*">Искусство</a></li>
                            <li><a href="*">Путешествие</a></li>
                            <li><a href="*">Наука & Технологии</a></li>
                            <li><a href="*">Музыка</a></li>
                            <li><a href="*">Еда</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4>Поддержка</h4>
                        <ul>
                            <li><a href="*">Онлайн поддержка</a></li>
                            <li><a href="*">Номера телефонов</a></li>
                            <li><a href="*">Почты</a></li>
                            <li><a href="*">Социальная поддержка</a></li>
                            <li><a href="*">Локация</a></li>
                        </ul>
                    </div>
                </div>

                <div class="couple__nav">
                    <div>
                        <h4>Блог</h4>
                        <ul>
                            <li><a href="*">Безопасность</a></li>
                            <li><a href="*">Восстановление</a></li>
                            <li><a href="*">Недавнее</a></li>
                            <li><a href="*">Популярное</a></li>
                            <li><a href="*">Все категории</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4>Страницы</h4>
                        <ul>
                            <li><a href="*">Начальная</a></li>
                            <li><a href="*">Блог</a></li>
                            <li><a href="*">О нас</a></li>
                            <li><a href="*">Сервисы</a></li>
                            <li><a href="*">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="footer__copyright">
            <p><small>Copyright &copy 2023 Someone</small></p>
        </div>
    </footer>
    <!-- <========================== Конец подвала  ==========================> -->
</body>
<script src="assets/js/main.js"></script>
</html>