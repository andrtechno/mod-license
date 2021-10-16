<?php
$imageBig = $model->getImageUrl('image');
$image = $model->getImageUrl('image', '300x385');
?>


<div class="attorneys-info attorneys-hv-link mg-60 custom-align custom-start">
    <div class="attorneys-avatar hv-link-content">
        <div class="image">
            <img src="<?= $image; ?>" alt="images">
        </div>
        <div class="overlay-box">
            <div class="content">
                <a href="<?= $imageBig; ?>" data-fancybox="gallery">
                    <i class="fa fa-link" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</div>
