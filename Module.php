<?php

namespace panix\mod\license;

use Yii;
use panix\engine\WebModule;
use yii\base\BootstrapInterface;
use yii\web\GroupUrlRule;

class Module extends WebModule implements BootstrapInterface
{

    public $icon = 'newspaper';

    public function bootstrap($app)
    {
        $groupUrlRule = new GroupUrlRule([
            'prefix' => $this->id,
            'rules' => [
                'page/<page:\d+>/per-page/<per-page:\d+>' => 'default/index',
                'page/<page:\d+>' => 'default/index',
                '' => 'default/index',
            ],
        ]);
        $app->getUrlManager()->addRules($groupUrlRule->rules, false);
    }

    public function getAdminMenu()
    {
        return [
            'modules' => [
                'items' => [
                    [
                        'label' => Yii::t($this->id.'/default', 'MODULE_NAME'),
                        'url' => ['/admin/'.$this->id],
                        'icon' => $this->icon,
                        'visible' => Yii::$app->user->can("/{$this->id}/admin/default/index") || Yii::$app->user->can("/{$this->id}/admin/default/*")
                    ],
                ],
            ],
        ];
    }


    public function getInfo()
    {
        return [
            'label' => Yii::t($this->id.'/default', 'MODULE_NAME'),
            'author' => 'dev@pixelion.com.ua',
            'version' => '1.0',
            'icon' => $this->icon,
            'description' => Yii::t($this->id.'/default', 'MODULE_DESC'),
            'url' => ['/admin/'.$this->id],
        ];
    }

}
