<?php

/**
 * Generation migrate by PIXELION CMS
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 *
 * Class m171409_132300_license
 */

use yii\db\Migration;
use panix\mod\license\models\License;
use panix\mod\license\models\LicenseTranslate;

class m171409_132300_license extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(License::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned(),
            'image' => $this->string()->null()->defaultValue(null),
            'views' => $this->integer()->defaultValue(0),
            'ordern' => $this->integer()->unsigned(),
            'switch' => $this->boolean()->defaultValue(1),
            'created_at' => $this->integer(11)->null(),
            'updated_at' => $this->integer(11)->null()
        ], $tableOptions);


        $this->createTable(LicenseTranslate::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'object_id' => $this->integer()->unsigned(),
            'language_id' => $this->tinyInteger()->unsigned(),
            'name' => $this->string(255),
        ], $tableOptions);


        $this->createIndex('switch', License::tableName(), 'switch');
        $this->createIndex('ordern', License::tableName(), 'ordern');
        $this->createIndex('user_id', License::tableName(), 'user_id');

        $this->createIndex('object_id', LicenseTranslate::tableName(), 'object_id');
        $this->createIndex('language_id', LicenseTranslate::tableName(), 'language_id');

        if ($this->db->driverName != "sqlite") {
            $this->addForeignKey('{{%fk_license_translate}}', LicenseTranslate::tableName(), 'object_id', License::tableName(), 'id', "CASCADE", "NO ACTION");
        }

    }

    public function down()
    {
        if ($this->db->driverName != "sqlite") {
            $this->dropForeignKey('{{%fk_license_translate}}', LicenseTranslate::tableName());
        }
        $this->dropTable(License::tableName());
        $this->dropTable(LicenseTranslate::tableName());
    }

}
