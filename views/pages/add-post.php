<?php
/**
 * @var \App\Kernel\View\IView $view
 */

$view->component('start');
?>

<section class="form__section container">
    <h2>Добавить пост</h2>    
    <form method="post" enctype="multipart/form-data">
        <?php $view->inputAndError('title', 'Заголовок'); ?>        
        
        <select name="category">
            <option value="1">Путешествие</option>
            <option value="2">Искусство</option>
            <option value="3">Наука & Технологии</option>
            <option value="4">Природа</option>
            <option value="5">Еда</option>
            <option value="6">Музыка</option>
        </select>            
        <?php $view->error('category'); ?>
        
        <textarea class="<?= $view->setInvalid('text') ?>" name="text" rows="10" placeholder="Текст поста"></textarea>
        <?php $view->error('text'); ?>
        
        <!-- TODO: только для админа -->
        <div class="form__control inline">
            <?php $view->inputAndError('isFeatured', type: 'checkbox'); ?>
            <label for="is_featured">Избранное</label>
        </div>
        <?php $view->error('isFeatured'); ?>
        
        <div class="form__control">
            <label for="thumbnail">Добавить картинку</label>
            <?php $view->inputAndError('thumbnail', type: 'file'); ?>
        </div>
        <?php $view->error('thumbnail'); ?>

        <button type="submit" class="btn">Добавить</button>
    </form>
</section>

<?php $view->component('end'); ?>