<?php
/**
 * @var \App\Kernel\View\IView $view
 * @var array<\App\Models\Category> $categories
 */

$view->component('start');
?>

<section class="dashboard">
    <div class="container dashboard__container">
        <?php $view->component('admin/manage', ['active' => 'categories']) ?>

        <main>
            <h2>Управление категориями</h2>
            <table>
                <thead>
                    <tr>
                        <th>Заголовок</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category) { 
                        if (!empty($category)) {?>
                            <tr>
                                <td><?= $category->title() ?></td>
                                <td><a href="/admin/category/edit?id=<?= $category->id() ?>" class="btn sm">Редактировать</a></td>
                                <td><a href="/admin/category/delete?id=<?= $category->id() ?>" class="btn sm danger">Удалить</a></td>
                            </tr>              
                        <?php } 
                    } ?>
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php $view->component('end'); ?>