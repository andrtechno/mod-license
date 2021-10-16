<?php
use panix\engine\widgets\ListView;
/*
*/


echo \panix\ext\fancybox\Fancybox::widget([
    'target' => 'a[data-fancybox="gallery"]',
    'options' => [
        'onInit' => new \yii\web\JsExpression('function(){
            console.log("dsad");
        }')
    ]
]);
?>


<div class="attorneys attorneys-style1">
    <div class="container">
        <div class="title-section text-center">
            <h3 class="flat-title"><?= $this->context->pageName; ?></h3>
        </div>
        <div class="attorneys-details">

                <?php
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_item',
                    //'layout' => '{sorter}{summary}{items}{pager}',
                    'layout' => '{items}{pager}',
                    'emptyText' => 'Empty',
                    'options' => ['class' => 'list-view row'],
                    'itemOptions' => ['class' => 'item col-lg-4 col-md-6 col-sm-6'],
                    'emptyTextOptions' => ['class' => 'alert alert-info'],
                    'pager' => [
                        'class' => '\panix\engine\widgets\LinkPager',
                        'options'=>['class'=>'pagination justify-content-center']
                    ]
                ]);
                ?>

        </div>
    </div>
</div><!-- attorneys -->
