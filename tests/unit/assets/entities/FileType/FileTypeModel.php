<?php

namespace tests\unit\assets\entities\FileType;


use bezdelnique\yii2app\entities\AbstractModel;


/**
 * This is the model class for table "file_types".
 *
 * @property integer $id
 * @property string $name
 * @property string $nick
 * @property string $createdAt
 */
class FileTypeModel extends AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file_types';
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
     * @return ActiveQuery the newly created [[ActiveQuery]] instance.
     */
    static public function find()
    {
        $o = new FileTypeQuery(get_called_class());
        return $o->orderBy('name asc');
    }


    public function getName(): string
    {
        return $this->name;
    }
}

