<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 29.09.2017
 * Time: 21:22
 */

namespace tests\unit;


use bezdelnique\yii2filter\AbstractFilterConfig;
use tests\unit\assets\Samples\Database\Filter;
use tests\unit\assets\Samples\Database\FilterConfig;
use tests\unit\assets\Samples\Database\FilterDataSource;
use tests\unit\entities\HardwareType\HardwareTypeFixture;


class FilterAbstract extends \Codeception\Test\Unit
{
    protected function _getConfiguredFilter()
    {
        $params = [
            'hardwareTypeId' => HardwareTypeFixture::GRAPHICS_VIDEO_ID,
            'operationSystemId' => null,
            'operationSystemBitId' => null,
            'companyId' => null,
        ];

        return new Filter($this->_getConfig(), $params);
    }


    protected function _getConfig(): AbstractFilterConfig
    {
        $dataSource = new FilterDataSource();
        $config = new FilterConfig($dataSource);

        return $config;
    }
}

