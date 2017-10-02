<?php
namespace tests\unit\assets\entities\Filter;

use bezdelnique\yii2app\entities\AbstractModel;


/**
 * This is the model class for table "filters_pregen".
 *
 * @property integer $hardwareId
 * @property integer $fileTypeId
 * @property integer $hardwareTypeId
 * @property integer $companyId
 * @property integer $operationSystemId
 * @property integer $operationSystemBitId
 */
class FilterModel extends AbstractModel
{
    public $hardwareName;
    public $fileTypeName;
    public $hardwareTypeName;
    public $companyName;
    public $operationSystemName;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filters_small_pregen';
    }


    public function rules()
    {
        return [
            [['hardwareId', 'hardwareTypeId', 'companyId', 'operationSystemId', 'operationSystemBitId', 'fileTypeId'], 'integer'],
            [['hardwareId', 'hardwareTypeId', 'companyId', 'operationSystemId', 'operationSystemBitId', 'fileTypeId'], 'required'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'hardwareId' => 'Аппаратное обеспечение',
            'hardwareTypeId' => 'Тип аппаратного обеспечения',
            'companyId' => 'Производитель',
            'operationSystemId' => 'Операционная система',
            'operationSystemBitId' => 'Разрядность операционной системы',
            'fileTypeId' => 'Тип файла',
        ];
    }


    /**
     * @return FilterQuery
     */
    public static function find()
    {
        return new FilterQuery(get_called_class());
    }


    public function getHardware(): HardwareModel
    {
        return RegistryRepository::getHardwareRepository()->getById($this->hardwareId);
    }


    public function getHardwareId(): int
    {
        return $this->hardwareId;
    }
}

