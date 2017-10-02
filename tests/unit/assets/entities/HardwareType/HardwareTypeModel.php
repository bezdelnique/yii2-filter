<?php

namespace tests\unit\assets\entities\HardwareType;

use bezdelnique\yii2app\entities\AbstractModel;


/**
 * This is the model class for table "hardware_types".
 *
 * @property integer $id
 * @property string $name
 * @property string $nick
 * @property string $createdAt
 */
class HardwareTypeModel extends AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hardware_types';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nick'], 'required'],
            [['createdAt'], 'safe'],
            [['name', 'nick'], 'string', 'max' => 255],
            [['nick'], 'unique'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'nick' => 'Псевдоним URL',
            'createdAt' => 'Дата создания',
        ];
    }


    /**
     * @inheritdoc
     * @return ActiveQuery|HardwareTypeQuery the newly created [[ActiveQuery]] instance.
     */
    static public function find()
    {
        $o = new HardwareTypeQuery(get_called_class());
        return $o->orderBy('name asc');
    }


    /**
     * /ru/audio-sound/
     * @return string
     */
    public function getUrl(): string
    {
        return $this->_getUrlManager()->getUrlHardwareType($this);
    }


    public function getNick(): string
    {
        return $this->nick;
    }


    public function getName(): string
    {
        return $this->name;
    }
}

