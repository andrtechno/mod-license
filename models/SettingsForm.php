<?php

namespace panix\mod\license\models;

use panix\engine\SettingsModel;

/**
 * Class SettingsForm
 */
class SettingsForm extends SettingsModel
{

    protected $module = 'license';
    public static $category = 'license';

    public $pagenum;

    public function rules()
    {
        return [
            ['pagenum', 'required'],
        ];
    }

    public static function defaultSettings()
    {
        return [
            'pagenum' => 10,
        ];
    }
}
