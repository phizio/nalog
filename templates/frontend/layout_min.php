<!DOCTYPE html>
<html>
    <head>
        <? e('sections/head_content') ?>
    </head>

    <body class="sticky_header">

    <div class="overflow_wrapper">
        <? e('frontend/sections/header') ?>

        <? e('frontend/sections/full_page_photo_with_title') ?>

        <div class="main">
            <? e('frontend/sections/triangles_of_section') ?>
            <?= $content ?>
            <? e('frontend/sections/twitter_feed') ?>
            <? e('frontend/sections/footer') ?>
        </div>

        <?= js_resources() ?>
    </div>

    </body>
</html>