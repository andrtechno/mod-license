<?php
use yii\helpers\Html;
use panix\engine\bootstrap\ActiveForm;

/**
 * @var \panix\engine\bootstrap\ActiveForm $form
 * @var \panix\mod\license\models\License $model
 */

$form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
]);
?>
<div class="card">
    <div class="card-header">
        <h5><?= Html::encode($this->context->pageName) ?></h5>
    </div>
    <div class="card-body">
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'image', [
            'parts' => [
                '{buttons}' => $model->getFileHtmlButton('image')
            ],
            'template' => '<div class="col-sm-4 col-lg-2">{label}</div>{beginWrapper}{input}{buttons}{error}{hint}{endWrapper}'
        ])->fileInput() ?>

    </div>
    <div class="card-footer text-center">
        <?= $model->submitButton(); ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
