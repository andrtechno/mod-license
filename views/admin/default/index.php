<?php

use panix\engine\grid\GridView;
use panix\engine\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var panix\engine\data\ActiveDataProvider $dataProvider
 * @var panix\mod\license\models\LicenseSearch $searchModel
 */

echo \panix\ext\fancybox\Fancybox::widget(['target' => '.image a']);
Pjax::begin([
    'dataProvider'=>$dataProvider
]);

echo GridView::widget([
    'tableOptions' => ['class' => 'table table-striped'],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layoutOptions' => ['title' => $this->context->pageName],
    'showFooter' => true,
     //   'footerRowOptions' => ['class' => 'text-center'],
    'rowOptions' => ['class' => 'sortable-column']
]);

Pjax::end();

