<?php

namespace panix\mod\license\controllers\admin;

use Yii;
use panix\mod\license\models\SettingsForm;
use panix\engine\controllers\AdminController;

class SettingsController extends AdminController
{

    public $icon = 'settings';

    public function actionIndex()
    {
        $this->pageName = Yii::t('app/default', 'SETTINGS');
        $this->view->params['breadcrumbs'][] = [
            'label' => Yii::t($this->module->id.'/default', 'MODULE_NAME'),
            'url' => ['/admin/'.$this->module->id]
        ];
        $this->view->params['breadcrumbs'][] = $this->pageName;
        $model = new SettingsForm;

        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){
                $model->save();
                Yii::$app->session->setFlash("success", Yii::t('app/default', 'SUCCESS_UPDATE'));
            }
            return $this->refresh();
        }

        return $this->render('index', ['model' => $model]);
    }

}
