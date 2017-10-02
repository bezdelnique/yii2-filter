<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 29.09.2017
 * Time: 21:07
 */

namespace tests\unit;


use bezdelnique\yii2filter\FilterException;
use tests\unit\assets\Samples\Database\Filter;
use tests\unit\assets\Samples\Database\FilterConfig;
use tests\unit\assets\Samples\Database\FilterDataSource;
use tests\unit\entities\Company\CompanyFixture;
use tests\unit\entities\HardwareType\HardwareTypeFixture;

class FilterConfigTest extends FilterAbstract
{
    public function testConfigOk()
    {
        $params = [
            'hardwareTypeId' => HardwareTypeFixture::AUDIO_SOUND_ID,
            'operationSystemId' => null,
            'operationSystemBitId' => null,
            'companyId' => CompanyFixture::AMD_ID,
        ];

        $dataSource = new FilterDataSource();
        $config = new FilterConfig($dataSource);
        $filter = new Filter([], $config);
    }


    public function testConfigFail()
    {
        $params = [
            'hardwareTypeId' => HardwareTypeFixture::AUDIO_SOUND_ID,
            'operationSystemId' => null,
            'operationSystemBitId' => null,
            'companyId' => CompanyFixture::AMD_ID,
            'someId' => 42,
        ];


        try {
            $dataSource = new FilterDataSource();
            $config = new FilterConfig($dataSource);
            $filter = new Filter($params, $config);
        } catch (\Exception $e) {
            $this->assertInstanceOf(FilterException::class, $e);
        }


    }


    public function testMapModelClassParamOk()
    {

    }


    public function testMapModelClassParamFail()
    {

    }
}

