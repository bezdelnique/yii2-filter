<?php

namespace tests\unit\assets\entities\OperationSystem;

use bezdelnique\yii2app\entities\AbstractModel;
use bezdelnique\yii2filter\IFilterModel;

/**
 * This is the model class for table "operation_systems".
 *
 * @property integer $id
 * @property string $name
 * @property string $nick
 * @property string $createdAt
 */
class OperationSystemModel extends AbstractModel implements IFilterModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operation_systems';
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
     * @return OperationSystemQuery
     */
    static public function find()
    {
        $o = new OperationSystemQuery(get_called_class());
        return $o->orderBy('name asc');
    }


    public function getName(): string
    {
        return $this->name;
    }
}

