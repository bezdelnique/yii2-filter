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


    public static function getMapParamNickToParamQs(): array
    {
        return [
            'operationSystem' => 'operationSystemId',
            'operationSystemBit' => 'operationSystemBitId',
            'hardwareType' => 'hardwareTypeId',
            'company' => 'companyId',
            'fileType' => 'fileTypeId',
        ];
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

