<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 06.10.2017
 * Time: 13:49
 */

namespace bezdelnique\yii2filter;


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
        return $this->_getFilterBridge()->getQueryParamsByBehaviorModel($this->owner);
    }


    public function filterIsChecked(): bool
    {
        return $this->_getFilterBridge()->isCheckedByBehaviorModel($this->owner);
    }


    public function filterGetBaseUrl(): string
    {
        return $this->_getFilterBridge()->getBaseUrlByBehaviorModel($this->owner);
    }


    private function _getFilterBridge(): IFilterModelBehaviourBridge
    {
        return $this->_filterBridge;
    }
}

