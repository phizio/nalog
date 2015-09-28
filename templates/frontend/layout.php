<!DOCTYPE html>
<html>
    <head>
        <? e('sections/head_content') ?>
    </head>

    <body class="sticky_header">

    <div class="overflow_wrapper">
        <? e('frontend/sections/header') ?>

        <? if ($self == 'index.php') e('frontend/sections/main_slider'); ?>

        <div class="main">
            <? e('frontend/sections/triangles_of_section') ?>
            <?= $content ?>
            <? e('frontend/sections/footer') ?>
        </div>

        <?= js_resources() ?>
    </div>

    </body>
</html>