<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 30.09.2017
 * Time: 15:40
 */
namespace tests\unit\assets\Samples\Database;


use bezdelnique\yii2filter\AbstractFilterConfig;
use bezdelnique\yii2filter\IFilterModelBehaviourBridge;


class FilterModelBehaviorBridge implements IFilterModelBehaviourBridge
{
    private $_config;
    private $_params;
    private $_removeParams;


    public function __construct(AbstractFilterConfig $config = null, array $params, array $removeParams)
    {
        $this->_config = $config;
        $this->_params = $params;
        $this->_removeParams = $removeParams;
    }


    private function _getParams(): array
    {
        return $this->_params;
    }


    private function _getRemoveParams(): array
    {
        return $this->_removeParams;
    }


    private function _getConfig(): AbstractFilterConfig
    {
        return $this->_config;
    }


    /**
     * Метод может корректно использоваться только внутри Behavior
     *
     * Вынуждено публичный :)
     */
    public function __isCheckedByBehaviorModel($class)
    {
        $paramName = $this->_getConfig()->getParamQsByModelClassName($class::className());

        if (isset($this->_getParams()[$paramName]) == true and $this->_getParams()[$paramName] == $class->id) {
            return true;
        } else if (isset($this->_getParams()[$paramName]) == false and $class->id == -1) {
            return true;
        }

        return false;
    }


    /**
     * Метод может корректно использоваться только внутри Behavior
     *
     * Вынуждено публичный :)
     */
    public function __getQueryParamsByBehaviorModel($class)
    {
        /**
         * Какие параметры исключать \ включить для конкретной Модели
         */
        $unset = $this->_getRemoveParams();
        $set = [];

        $paramName = $this->_getConfig()->getParamQsByModelClassName($class::className());
        $unset[] = $paramName;

        if ($class->id != -1) {
            $set[$paramName] = $class->id;
        }


        /**
         * Формирование параметров
         * Исключение
         */
        $params = [];
        foreach ($this->_getParams() as $key => $val) {
            if (in_array($key, $unset)) {
                continue;
            }

            $params[$key] = $val;
        }

        /**
         * Включение
         */
        $params = array_merge($params, $set);

        return $params;
    }
}

