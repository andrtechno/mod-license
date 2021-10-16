<?php

namespace panix\mod\license\controllers\admin;

use Yii;
use yii\web\Response;
use panix\engine\Html;
use panix\mod\license\models\License;
use panix\mod\license\models\LicenseSearch;
use panix\engine\controllers\AdminController;


class DefaultController extends AdminController
{

    public function actions()
    {
        return [
            'sortable' => [
                'class' => 'panix\engine\grid\sortable\Action',
                'modelClass' => License::class,
            ],
            'switch' => [
                'class' => 'panix\engine\actions\SwitchAction',
                'modelClass' => License::class,
            ],
            'delete' => [
                'class' => 'panix\engine\actions\DeleteAction',
                'modelClass' => License::class,
            ],
            'delete-file' => [
                'class' => 'panix\engine\actions\DeleteFileAction',
                'modelClass' => License::class,
            ],
        ];
    }

    public function actionIndex()
    {
        $this->pageName = Yii::t($this->module->id.'/default', 'MODULE_NAME');
        if (Yii::$app->user->can("/{$this->module->id}/{$this->id}/*") || Yii::$app->user->can("/{$this->module->id}/{$this->id}/create")) {
            $this->buttons = [
                [
                    'icon' => 'add',
                    'label' => Yii::t($this->module->id.'/default', 'CREATE_BTN'),
                    'url' => ['create'],
                    'options' => ['class' => 'btn btn-success']
                ]
            ];
        }
        $this->view->params['breadcrumbs'] = [
            $this->pageName
        ];

        $searchModel = new LicenseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionUpdate($id = false)
    {

        $model = License::findModel($id);
        $this->pageName = Yii::t($this->module->id.'/default', 'CREATE_BTN');
        if (Yii::$app->user->can("/{$this->module->id}/{$this->id}/*") || Yii::$app->user->can("/{$this->module->id}/{$this->id}/create")) {
            $this->buttons = [
                [
                    'icon' => 'add',
                    'label' => Yii::t($this->module->id.'/default', 'CREATE_BTN'),
                    'url' => ['create'],
                    'options' => ['class' => 'btn btn-success']
                ]
            ];
        }
        $this->view->params['breadcrumbs'][] = [
            'label' => Yii::t($this->module->id.'/default', 'MODULE_NAME'),
            'url' => ['index']
        ];
        $this->view->params['breadcrumbs'][] = $this->pageName;
        $result = [];
        $result['success'] = false;
        $isNew = $model->isNewRecord;
        //$model->setScenario("admin");
        $post = Yii::$app->request->post();
        if ($model->load($post)) {
            //if (Yii::$app->request->isAjax) {
            //    Yii::$app->response->format = Response::FORMAT_JSON;
            //    return ActiveForm::validate($model);
            //}

            if ($model->validate()) {
                $model->save();

                $json['success'] = false;
                if (Yii::$app->request->isAjax && Yii::$app->request->post('ajax')) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    $json['success'] = true;
                    $json['message'] = Yii::t('app/default','SUCCESS_UPDATE');
                    return $json;
                }

                return $this->redirectPage($isNew, $post);
            } else {
                // print_r($model->getErrors());
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function getAddonsMenu()
    {
        return [
            [
                'label' => Yii::t('app/default', 'SETTINGS'),
                'url' => ['/admin/'.$this->module->id.'/settings/index'],
                'icon' => Html::icon('settings'),
            ],
        ];
    }

    public function actionCreate()
    {
        return $this->actionUpdate(false);
    }
}
