<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 29.09.2017
 * Time: 18:31
 */

namespace tests\unit\assets\Samples\DatabaseMinimalConfig;


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
            'operationSystem' => 'getOperationSystems',
            'operationSystemBit' => 'getOperationSystemBits',
            'hardwareType' => 'getHardwareTypes',
            'company' => 'getCompanies',
            'fileType' => 'getFileTypes',
        ];
    }
}

