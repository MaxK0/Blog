<?php
/**
 * @var \App\Kernel\View\IView $view
 * @var array<\App\Kernel\Auth\User> $users
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
                    <a href="/admin/dashboard/posts">
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
                    <a href="/admin/dashboard/users" class="active">
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
            <h2>Управление пользователями</h2>
            <table>
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Никнейм</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                        <th>Админ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user->surname() . ' ' . $user->name() ?></td>
                        <td><?= $user->nick() ?></td>
                        <td><a href="/admin/user/edit?id=<?= $user->id() ?>" class="btn sm">Редактировать</a></td>
                        <td><a href="/admin/user/delete?id=<?= $user->id() ?>" class="btn sm danger">Удалить</a></td>
                        <td><?= $user->isAdmin() ? 'Да' : 'Нет' ?></td>
                    </tr>    
                    <?php } ?>                    
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php $view->component('end') ?>