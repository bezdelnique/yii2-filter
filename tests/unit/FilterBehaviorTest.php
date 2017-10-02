<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 29.09.2017
 * Time: 21:11
 */

namespace tests\unit;



use tests\unit\assets\Samples\Database\FilterModelBehavior;
use tests\unit\assets\Samples\Database\FilterModelBehaviorBridge;
use tests\unit\entities\HardwareType\HardwareTypeFixture;

class FilterBehaviorTest extends FilterAbstract
{
    public function testAttach()
    {
        $filter = $this->_getConfiguredFilter();
        $filterBehaviorBridge = new FilterModelBehaviorBridge($this->_getConfig(), $filter->getParams(), $filter->getRemoveParams());

        $hardwareType = HardwareTypeFixture::getGraphicsVideo();
        $behavior = new FilterModelBehavior($filterBehaviorBridge);
        $hardwareType->attachBehavior('filterBehavior', $behavior);

        verify($hardwareType->filterIsChecked())->true();
        verify($hardwareType->filterGetQueryParams())->equals([
            'hardwareTypeId' => 3,
            'operationSystemBitId' => null,
            'companyId' => null,
            'operationSystemId' => null,
        ]);
    }
}

