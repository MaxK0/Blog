<?php
/**
 * @var \App\Kernel\View\IView $view
 * @var array<\App\Models\Post> $posts
 */

$view->component('start');
?>

<section class="dashboard">
    <div class="container dashboard__container">
        <?php $view->component('admin/manage', ['active' => 'posts']) ?>

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
                    <?php foreach ($posts as $post) { 
                        if (!empty($post)) { ?>
                            <tr>
                                <td><?= $post->title() ?></td>
                                <td><?php foreach ($post->categories() as $category) {
                                    echo $category->title();
                                } ?></td>
                                <td><a href="/post/edit?id=<?= $post->id() ?>" class="btn sm">Редактировать</a></td>
                                <td><a href="/post/delete?id=<?= $post->id() ?>" class="btn sm danger">Удалить</a></td>
                                <td><?= $post->author()->nick() ?></td>
                            </tr>                        
                        <?php } 
                    } ?>
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php $view->component('end'); ?>