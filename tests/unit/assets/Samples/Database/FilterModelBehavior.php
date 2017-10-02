<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 27.06.17
 * Time: 17:52
 */
namespace tests\unit\assets\Samples\Database;


use bezdelnique\yii2filter\IFilterBehavior;
use bezdelnique\yii2filter\IFilterModelBehaviourBridge;
use yii\base\Behavior;


class FilterModelBehavior extends Behavior implements IFilterBehavior
{
    private $_filterBridge = null;


    function __construct(IFilterModelBehaviourBridge $filterBridge, array $config = [])
    {
        $this->_filterBridge = $filterBridge;
        parent::__construct($config);
    }


    public function filterGetQueryParams(): array
    {
        return $this->_filterBridge->__getQueryParamsByBehaviorModel($this->owner);
    }


    public function filterIsChecked(): bool
    {
        return $this->_filterBridge->__isCheckedByBehaviorModel($this->owner);
    }
}

