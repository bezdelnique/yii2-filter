<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 06.10.2017
 * Time: 14:11
 */

namespace tests\unit;


use bezdelnique\yii2filter\AbstractFilterConfig;
use tests\unit\assets\Samples\DatabaseMinimalConfig\FilterConfig;
use tests\unit\assets\Samples\DatabaseMinimalConfig\Filter;
use tests\unit\assets\Samples\DatabaseMinimalConfig\FilterDataSource;
use tests\unit\entities\HardwareType\HardwareTypeFixture;

class FilterMinimalConfigTest extends \tests\unit\FilterTest
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
