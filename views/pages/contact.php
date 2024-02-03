<?php
/**
 * @var \App\Kernel\View\IView $view
 */

$view->component('start');
?>

<section class="section__title">
    <h1>Контакты</h1>
</section>
<section class="section__contacts container">
    <h2>Главные</h2>
    <div class="contacts__phone">
        <p><strong>Номер телефона:</strong></p>
        <a href="tel: +79999999999">+79999999999</a>
    </div>
    <div class="contacts__facebook">
        <p><strong>Facebook:</strong></p>
        <a href="facebook.com">facebook.com</a>
    </div>

    <h2>Запасные</h2>
    <div class="contacts__phone">
        <p><strong>Номер телефона:</strong></p>
        <a href="tel: +79999999999">+79999999999</a>
    </div>
    <div class="contacts__facebook">
        <p><strong>Facebook:</strong></p>
        <a href="facebook.com">facebook.com</a>
    </div>
</section>

<?php $view->component('end'); ?>