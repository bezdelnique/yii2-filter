<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 29.09.2017
 * Time: 18:31
 */

namespace tests\unit\assets\Samples\Database;


use bezdelnique\yii2filter\AbstractFilterConfig;
use bezdelnique\yii2filter\FilterException;


class FilterConfig extends AbstractFilterConfig
{
    public static function getValidParams(): array
    {
        return [
            'operationSystemId',
            'operationSystemBitId',
            'companyId',
            'hardwareId',
            'hardwareTypeId',
            'fileTypeId',
        ];
    }


    public static function getMapClassToParamName(): array
    {
        return [
            'OperationSystemModel' => 'operationSystemId',
            'OperationSystemBitModel' => 'operationSystemBitId',
            'HardwareTypeModel' => 'hardwareTypeId',
            'CompanyModel' => 'companyId',
            'FileTypeModel' => 'fileTypeId',
        ];
    }


    public function getParamQsByModelClassName($className): string
    {
        $classNameShort = substr($className, strrpos($className, '\\') + 1);
        $map = $this->getMapClassToParamName();

        if (array_key_exists($classNameShort, $map) == false) {
            throw new FilterException('Соответствие параметр-класс для класса ' . $classNameShort . ' не найдено.');
        }

        return $map[$classNameShort];
    }


    public static function getMapParamNameToDataSourceGetter(): array
    {
        return [
            'operationSystem' => 'getOperationSystems',
            'operationSystemBit' => 'getOperationSystemBits',
            'hardwareType' => 'getHardwareTypes',
            'company' => 'getCompanies',
            'fileType' => 'getFileTypes',
        ];
    }


    public function getParamQsByParamNick(string $paramNick): string
    {
        $arr = [
            'operationSystem' => 'operationSystemId',
            'operationSystemBit' => 'operationSystemBitId',
            'hardwareType' => 'hardwareTypeId',
            'company' => 'companyId',
            'fileType' => 'fileTypeId',
        ];

        if (array_key_exists($paramNick, $arr) == false) {
            throw new FilterException('ParamQs for ' . $paramNick . ' does not set.');
        }

        return $arr[$paramNick];
    }


    public function getBehaviorClassName(): string
    {
        return '\tests\unit\assets\Samples\Database\FilterModelBehavior';
    }


    public function getBehaviorBridgeClassName(): string
    {
        return '\tests\unit\assets\Samples\Database\FilterModelBehaviorBridge';
    }
}

