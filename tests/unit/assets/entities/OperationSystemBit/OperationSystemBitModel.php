<?php

namespace tests\unit\assets\entities\OperationSystemBit;

use bezdelnique\yii2app\entities\AbstractModel;
use bezdelnique\yii2filter\IFilterModel;

/**
 * This is the model class for table "operation_system_bits".
 *
 * @property integer $id
 * @property string $name
 * @property integer $nick
 * @property string $createdAt
 */
class OperationSystemBitModel extends AbstractModel implements IFilterModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operation_system_bits';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'nick'], 'required'],
            [['createdAt'], 'safe'],
            [['name', 'nick'], 'string', 'max' => 255],
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
     * @return OperationSystemBitQuery
     */
    static public function find()
    {
        $o = new OperationSystemBitQuery(get_called_class());
        return $o->orderBy('name asc');
    }


    public function getName(): string
    {
        return $this->name;
    }
}

