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

    <section class="dashboard">
        <div class="container dashboard__container">
            <button id="show__sidebar-btn" class="sidebar__toggle"><img src="assets/img/icons/arrow.png" alt=""></button>
            <button id="hide__sidebar-btn" class="sidebar__toggle"><img src="assets/img/icons/arrow.png" alt=""></button>
            <aside>
                <ul>
                    <li>
                        <a href="add-post.html">
                            <img src="assets/img/icons/write.png" alt="">
                            <h4>Добавить пост</h4>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.html">
                            <img src="assets/img/icons/post.png" alt="">
                            <h4>Управлять постами</h4>
                        </a>
                    </li>                     
                </ul>
            </aside>

            <main>
                <h2>Управление постами</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Категории</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Заголовок</td>
                            <td>Природа</td>
                            <td><a href="edit-post.html" class="btn sm">Редактировать</a></td>
                            <td><a href="delete-post.html" class="btn sm danger">Удалить</a></td>
                        </tr>                        
                    </tbody>
                </table>
            </main>
        </div>
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