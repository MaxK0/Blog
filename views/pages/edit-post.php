<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить пост</h2>
    <div class="alert__message error">
        <p>Сообщение об ошибке</p>
    </div>
    <form method="post" enctype="multipart/form-data">
        <input type="text" placeholder="Заголовок">
        <select name="category">
            <option value="1">Путешествие</option>
            <option value="2">Искусство</option>
            <option value="3">Наука & Технологии</option>
            <option value="4">Природа</option>
            <option value="5">Еда</option>
            <option value="6">Музыка</option>
        </select>            
        <textarea name="text" rows="10" placeholder="Текст поста"></textarea>
        <!-- TODO: только для админа -->
        <div class="form__control inline">
            <input type="checkbox" name="isFeatured" id="is_featured">
            <label for="is_featured">Избранное</label>
        </div>

        <div class="form__control">
            <label for="thumbnail">Добавить картинку</label>
            <input type="file" name="thumbnail" id="thumbnail">
        </div>
        <button type="submit" class="btn">Добавить пост</button>
    </form>
</section>

<?php $view->component('end'); ?>