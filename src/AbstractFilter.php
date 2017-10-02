<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 29.09.2017
 * Time: 18:33
 */

namespace bezdelnique\yii2filter;

class AbstractFilter
{
    private $_config;
    private $_behaviorBridge;
    private $_params = [];
    private $_validParams = [];
    /**
     * Параметры которые будут исключены при формировании queryString
     * @var array
     */
    private $_removeParams = [];


    public function __construct(array $params, AbstractFilterConfig $config = null)
    {
        $this->_setConfig($config);
        $this->_setParams($config->getValidParams(), $params);
    }


    public function removeParamFromQueryString(string $paramName)
    {
        $this->_paramCheck($paramName);
        $this->_removeParams[] = $paramName;
        return $this;
    }


    public function __call(string $methodName, array $arguments): array
    {
        $addTheAllElement = true;
        $pos = strpos($methodName, 'NoAll');
        if ($pos !== false) {
            $methodName = substr($methodName, 0, $pos);
            $addTheAllElement = false;
        }

        if ($this->_getConfig()->isValidDataSourceGetter($methodName) == false) {
            throw new FilterException('Getter ' . $methodName . ' does not found in map.');
        }

        $paramQS = $this->_getConfig()->getParamQsByDataSourceGetter($methodName);

        $params = $this->_getParams();

        if (isset($params[$paramQS])) {
            unset($params[$paramQS]);
        }

        $entities = $this->_getConfig()->getDataByDataSourceGetter($methodName, $params);

        if ($addTheAllElement == true) {
            $this->_addTheAllElement($entities);
        }

        $this->_attachBehavior($entities);

        return $entities;
    }


    protected function _getParams(): array
    {
        return $this->_params;
    }


    protected function _getRemoveParams(): array
    {
        return $this->_removeParams;
    }


    public function getParams()
    {
        return $this->_getParams();
    }


    public function getRemoveParams()
    {
        return $this->_getRemoveParams();
    }


    private function _getConfig(): AbstractFilterConfig
    {
        if (is_null($this->_config) == true) {
            throw new FilterException('Config must be set. Use setConfig().');
        }

        return $this->_config;
    }


    private function _setParams(array $validParams, array $params): void
    {
        /**
         * Проверка $params
         */
        foreach ($params as $key => $val) {
            if (in_array($key, $validParams) == false) {
                throw new FilterException('Недопустимый параметр фильтра: ' . $key);
            }

            if (false == is_null($val) and is_numeric($val) == false) {
                throw new FilterException('Значение фильтра ' . $key . ' дожно быть число.');
            }
        }


        $this->_params = $params;
        $this->_validParams = $validParams;
    }


    /**
     * Добавляет в начало массива фейковый элемент "Все"
     * @param $entities
     */
    private function _addTheAllElement(&$entities)
    {
        if (empty($entities) == false) {
            $class = $entities[0]::className();

            $empty = new $class();
            $empty->id = -1;
            $empty->name = 'Все';
            array_unshift($entities, $empty);
        }
    }


    private function _getBehaviorBridge(): IFilterModelBehaviourBridge
    {
        if (is_null($this->_behaviorBridge) == true) {
            $className = $this->_getConfig()->getBehaviorBridgeClassName();
            $this->_behaviorBridge = new $className($this->_getConfig(), $this->_getParams(), $this->_getRemoveParams());
        }

        return $this->_behaviorBridge;
    }


    /**
     * Навешивание Behavior
     * @param $entities
     */
    private function _attachBehavior(&$entities)
    {
        $className = $this->_getConfig()->getBehaviorClassName();
        foreach ($entities as $entity) {
            /** @var IFilterModel $entity */
            $behavior = new $className($this->_getBehaviorBridge());
            $entity->attachBehavior('filterBehavior', $behavior);
        }
    }


    private function _paramCheck(string $paramName): void
    {
        if (in_array($paramName, $this->_getValidParams()) == false) {
            throw new FilterException('Недопустимый параметр фильтра: ' . $paramName);
        }
    }


    private function _getValidParams(): array
    {
        return $this->_validParams;
    }


    private function _setConfig(AbstractFilterConfig $config): void
    {
        $this->_config = $config;
    }
}

