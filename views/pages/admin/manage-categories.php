<?php
/**
 * @var \App\Kernel\View\IView $view
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
                    <tr>
                        <td>Путешествие</td>
                        <td><a href="/admin/category/edit" class="btn sm">Редактировать</a></td>
                        <td><a href="/admin/category/delete" class="btn sm danger">Удалить</a></td>
                    </tr>
                    <tr>
                        <td>Природа</td>
                        <td><a href="/admin/category/edit" class="btn sm">Редактировать</a></td>
                        <td><a href="/admin/category/delete" class="btn sm danger">Удалить</a></td>
                    </tr>                    
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php $view->component('end'); ?>