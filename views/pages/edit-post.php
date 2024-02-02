<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить пост</h2>    
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Заголовок">
        <?php $view->errorInForm('title'); ?>
        
        <select name="category">
            <option value="1">Путешествие</option>
            <option value="2">Искусство</option>
            <option value="3">Наука & Технологии</option>
            <option value="4">Природа</option>
            <option value="5">Еда</option>
            <option value="6">Музыка</option>
        </select>            
        <?php $view->errorInForm('category'); ?>
        
        <textarea name="text" rows="10" placeholder="Текст поста"></textarea>
        <?php $view->errorInForm('text'); ?>
        
        <!-- TODO: только для админа -->
        <div class="form__control inline">
            <input type="checkbox" name="isFeatured" id="is_featured">
            <label for="is_featured">Избранное</label>
        </div>
        <?php $view->errorInForm('isFeatured'); ?>
        
        <div class="form__control">
            <label for="thumbnail">Добавить картинку</label>
            <input type="file" name="thumbnail" id="thumbnail">
        </div>
        <?php $view->errorInForm('thumbnail'); ?>

        <button type="submit" class="btn">Добавить пост</button>
    </form>
</section>

<?php $view->component('end'); ?>