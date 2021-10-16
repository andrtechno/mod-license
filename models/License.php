<?php

namespace panix\mod\license\models;

//use panix\mod\sitemap\behaviors\SitemapBehavior;
use Yii;
use panix\engine\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "license".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $created_at
 * @property integer $updated_at
 */
class License extends ActiveRecord
{

    const route = '/admin/license/default';
    const MODULE_ID = 'license';
    public $translationClass = LicenseTranslate::class;


    public static function find()
    {
        return new LicenseQuery(get_called_class());
    }

    public function getGridColumns()
    {
        return [
            'id' => [
                'attribute' => 'id',
                'contentOptions' => ['class' => 'text-center'],
            ],
            'name' => [
                'attribute' => 'name',
                'contentOptions' => ['class' => 'text-center'],
            ],
            'image' => [
                'attribute' => 'image',
                'format' => 'raw',
                'contentOptions' => ['class' => 'text-center image'],
                'value' => function ($model) {
                    return Html::a(Html::img($model->getImageUrl('image', '100x100')), $model->getImageUrl('image'));
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => 'raw',
                'filter' => \yii\jui\DatePicker::widget([
                    'model' => new LicenseSearch(),
                    'attribute' => 'created_at',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => ['class' => 'form-control']
                ]),
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->created_at, 'php:d M Y H:i:s');
                }
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'raw',
                'filter' => \yii\jui\DatePicker::widget([
                    'model' => new LicenseSearch(),
                    'attribute' => 'updated_at',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => ['class' => 'form-control']
                ]),
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->updated_at, 'php:d M Y H:i:s');
                }
            ],
            'DEFAULT_CONTROL' => [
                'class' => 'panix\engine\grid\columns\ActionColumn',
            ],
            'DEFAULT_COLUMNS' => [
                ['class' => 'panix\engine\grid\columns\CheckboxColumn'],
                [
                    'class' => \panix\engine\grid\sortable\Column::class,
                    'url' => ['/admin/license/default/sortable']
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%license}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['updated_at', 'created_at'], 'safe'],
            [['image'], 'default'],
        ];
    }


    public function getUser()
    {
        return $this->hasOne(Yii::$app->user->identityClass, ['id' => 'user_id']);
    }

    public function behaviors()
    {
        $b = [];
        $b['uploadFile'] = [
            'class' => 'panix\engine\behaviors\UploadFileBehavior',
            'files' => [
                'image' => '@uploads/license',
            ],
            'options' => [
                'watermark' => false
            ]
        ];

        return \yii\helpers\ArrayHelper::merge($b, parent::behaviors());
    }

}
