<?php
/**
 * @var \App\Kernel\View\IView $view
 * @var array<\App\Kernel\Auth\User> $users
 */

$view->component('start');
?>

<section class="dashboard">
    <div class="container dashboard__container">
        <?php $view->component('admin/manage', ['active' => 'users']) ?>

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
                    <?php foreach ($users as $user) { 
                        if (!empty($user)) { ?>
                            <tr>
                                <td><?= $user->surname() . ' ' . $user->name() ?></td>
                                <td><?= $user->nick() ?></td>
                                <td><a href="/admin/user/edit?id=<?= $user->id() ?>" class="btn sm">Редактировать</a></td>
                                <td><a href="/admin/user/delete?id=<?= $user->id() ?>" class="btn sm danger">Удалить</a></td>
                                <td><?= $user->isAdmin() ? 'Да' : 'Нет' ?></td>
                            </tr>    
                        <?php }
                    } ?>                    
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php $view->component('end') ?>