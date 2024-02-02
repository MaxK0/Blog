<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="dashboard">
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><img src="/assets/img/icons/arrow.png" alt=""></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><img src="/assets/img/icons/arrow.png" alt=""></button>
        <aside>
            <ul>
                <li>
                    <a href="/post/add">
                        <img src="/assets/img/icons/write.png" alt="">
                        <h4>Добавить пост</h4>
                    </a>
                </li>
                <li>
                    <a href="/admin/dashboard/posts" class="active">
                        <img src="/assets/img/icons/post.png" alt="">
                        <h4>Управлять постами</h4>
                    </a>
                </li>
                <li>
                    <a href="/admin/user/add">
                        <img src="/assets/img/icons/add-user.png" alt="">
                        <h4>Добавить пользователя</h4>
                    </a>
                </li>
                <li>
                    <a href="/admin/dashboard/users">
                        <img src="/assets/img/icons/users.png" alt="">
                        <h4>Управлять пользователями</h4>
                    </a>
                </li>
                <li>
                    <a href="/admin/category/add">
                        <img src="/assets/img/icons/write2.png" alt="">
                        <h4>Добавить категорию</h4>
                    </a>
                </li>
                <li>
                    <a href="/admin/dashboard/categories">
                        <img src="/assets/img/icons/list.png" alt="">
                        <h4>Управлять категориями</h4>
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
                        <th>Пользователь</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Заголовок</td>
                        <td>Природа</td>
                        <td><a href="/post/edit" class="btn sm">Редактировать</a></td>
                        <td><a href="/post/add" class="btn sm danger">Удалить</a></td>
                        <td>user</td>
                    </tr>                        
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php $view->component('end'); ?>