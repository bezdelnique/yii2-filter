<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 29.09.2017
 * Time: 18:31
 */

namespace tests\unit\assets\Samples\Database;


use bezdelnique\yii2filter\AbstractFilterConfig;


class FilterConfig extends AbstractFilterConfig
{
    public function getValidParamsQs(): array
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


    public function getMapClassNameToParamQs(): array
    {
        return [
            'OperationSystemModel' => 'operationSystemId',
            'OperationSystemBitModel' => 'operationSystemBitId',
            'HardwareTypeModel' => 'hardwareTypeId',
            'CompanyModel' => 'companyId',
            'FileTypeModel' => 'fileTypeId',
        ];
    }


    public function getMapParamQsToDataSourceGetter(): array
    {
        return [
            'operationSystemId' => 'getOperationSystems',
            'operationSystemBitId' => 'getOperationSystemBits',
            'hardwareTypeId' => 'getHardwareTypes',
            'companyId' => 'getCompanies',
            'fileTypeId' => 'getFileTypes',
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

