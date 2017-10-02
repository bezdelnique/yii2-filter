<?php

namespace tests\unit\assets\entities\Company;

use bezdelnique\yii2app\entities\ExceptionModel;
use bezdelnique\yii2filter\IFilterModel;
use bezdelnique\yii2app\entities\AbstractModel;

/**
 * @property integer $id
 * @property string $name
 * @property string $nick
 * @property integer $hasLogo
 * @property string $createdAt
 */
class CompanyModel extends AbstractModel implements IFilterModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
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
            [['hasLogo'], 'integer'],
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
            'hasLogo' => 'Есть логотип',
            'createdAt' => 'Дата создания',
        ];
    }


    /**
     * @inheritdoc
     * @return CompanyQuery
     */
    static public function find()
    {
        $q = new CompanyQuery(get_called_class());

        $q->select(static::tableName() . '.*');
        $q->from(static::tableName());

        return $q->orderBy('name asc');
    }


    public function hasLogo(): bool
    {
        if (false == empty($this->hasLogo)) {
            return true;
        }

        return false;
    }


    public function getLogoUrl(): string
    {
        if ($this->hasLogo() == false) {
            throw new ExceptionModel('Перед вызовом getLogoUrl(), проверьте наличие логотипа при помощи функции hasLogo().');
        }

        return '/i/company-logo/' . $this->id . '.png';
    }


    public function getUrl(): string
    {
        return $this->_getUrlManager()->getUrlCompany($this);
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getNick(): string
    {
        return $this->nick;
    }
}

