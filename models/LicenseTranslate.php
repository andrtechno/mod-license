<?php

namespace panix\mod\license\models;

use yii\db\ActiveRecord;

/**
 * Class LicenseTranslate
 *
 * @property array $translationAttributes
 */
class LicenseTranslate extends ActiveRecord
{

    public static $translationAttributes = ['name'];

    public static function tableName()
    {
        return '{{%license_translate}}';
    }

}
