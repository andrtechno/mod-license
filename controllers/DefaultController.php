<?php

namespace panix\mod\license\controllers;

use panix\engine\data\ActiveDataProvider;
use Yii;
use panix\engine\controllers\WebController;
use panix\mod\license\models\License;
use yii\helpers\ArrayHelper;

class DefaultController extends WebController
{

    public function actionIndex()
    {
        $this->pageName = Yii::t('license/default', 'MODULE_NAME');

        $this->view->params['breadcrumbs'][] = $this->pageName;
        $query = License::find()->published();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


}
