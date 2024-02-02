<?php
/**
 * @var \App\Kernel\View\View $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Изменить пост</h2>        
    <form action="" enctype="multipart/form-data">
        <input type="text" placeholder="Заголовок">
        <select>
            <option value="1">Путешествие</option>
            <option value="1">Искусство</option>
            <option value="1">Наука & Технологии</option>
            <option value="1">Природа</option>
            <option value="1">Еда</option>
            <option value="1">Музыка</option>
        </select>            
        <textarea rows="10" placeholder="Текст поста"></textarea>
        <div class="form__control inline">
            <input type="checkbox" id="is_featured">
            <label for="is_featured">Избранное</label>
        </div>
        <div class="form__control">
            <label for="thumbnail">Изменить картинку</label>
            <input type="file" id="thumbnail">
        </div>
        <button type="submit" class="btn">Изменить пост</button>
    </form>
</section>

<?php $view->component('end'); ?>