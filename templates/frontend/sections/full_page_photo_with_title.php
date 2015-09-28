<div class="full_page_photo <?
if (empty($page['background-image'])) echo 'no_photo'; ?>" style="<?
if (!empty($page['background-image'])) echo 'background-image: url(' . $page['background-image'] . ');'; ?>">
    <div class="hgroup">
        <div class="hgroup_title animated bounceInUp">
            <div class="container">
                <h1><?= $page['title'] ?></h1>
            </div>
        </div>
        <div class="hgroup_subtitle animated bounceInUp skincolored">
            <div class="container">
                <p><?= $page['desc'] ?></p>
            </div>
        </div>
    </div>
</div>


