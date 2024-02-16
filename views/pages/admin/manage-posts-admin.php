<?php
/**
 * @var \App\Kernel\View\IView $view
 * @var array<\App\Models\Post> $posts
 */

$view->component('start');
?>

<section class="dashboard">
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><img src="/assets/img/icons/arrow.png" alt=""></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><img src="/assets/img/icons/arrow.png" alt=""></button>
        <aside> <!-- TODO: как один компонент -->
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
                    <?php foreach ($posts as $post) { ?>
                        <tr>
                            <td><?= $post->title() ?></td>
                            <td><?php foreach ($post->categories() as $category) {
                                echo $category->title();
                            } ?></td>
                            <td><a href="/post/edit?id=<?= $post->id() ?>" class="btn sm">Редактировать</a></td>
                            <td><a href="/post/delete?id=<?= $post->id() ?>" class="btn sm danger">Удалить</a></td>
                            <td><?= $post->author()->nick() ?></td>
                        </tr>                        
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php $view->component('end'); ?>