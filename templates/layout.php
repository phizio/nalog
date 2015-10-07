<!DOCTYPE html>
<html>
    <head>
        <? e('sections/head_content') ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">

        <? if ($jcrop_modal_need) e('jcrop/modal'); ?>

        <div class="wrapper">]

            <? e('sections/header') ?>
            <? e('sections/sidebar') ?>

            <div class="content-wrapper">

                <? e('sections/content_header') ?>
                <? e('sections/alerts') ?>

                <!-- Main content -->
                <section class="content">
                    <?= $content ?>
                </section>

                <? e('sections/footer') ?>
                <? e('sections/right_sidebar') ?>

            </div>

        </div><!-- ./wrapper -->

        <?= js_resources() ?>
    </body>
</html>