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
    private $_removeParamsQs = [];


    public function __construct(AbstractFilterConfig $config = null, array $params)
    {
        $this->_setConfig($config);
        $this->_setParams($config->getValidParamsQs(), $params);
    }


    public function removeParamFromQueryString(string $paramName)
    {
        $this->_paramCheck($paramName);
        $this->_removeParamsQs[] = $paramName;
        return $this;
    }


    public function __call(string $methodName, array $arguments)
    {
        $callMethodCount = false;
        $pos = strpos($methodName, 'Count');
        if ($pos !== false) {
            $callMethodCount = true;
        }

        if ($callMethodCount == true) {
            return $this->_callCount($methodName, $arguments);
        } else {
            return $this->_callGet($methodName, $arguments);
        }
    }


    private function _callGet(string $methodName, array $arguments): array
    {
        $addTheAllElement = false;
        if ($this->_getConfig()->defaultAddTheAllElement() == true) {
            $addTheAllElement = true;
            $pos = strpos($methodName, 'WithoutAll');
            if ($pos !== false) {
                $methodName = substr($methodName, 0, $pos);
                $addTheAllElement = false;
            }
        }

        if ($this->_getConfig()->isValidDataSourceGetter($methodName) == false) {
            throw new FilterException('DataSource getter ' . $methodName . '() does not found in map. Check ' . get_class($this->_getConfig()) . '::getMapParamQsToDataSourceGetter(). Also you can add method to ' . get_called_class() . '.');
        }

        $entities = $this->_getConfig()->getDataByDataSourceGetter($methodName, $this->_getCallParams($methodName), $this->_getParams());
        if ($addTheAllElement == true) {
            $this->_addTheAllElement($entities);
        }
        $this->_attachBehavior($entities);

        return $entities;
    }


    private function _callCount(string $methodName, array $arguments): int
    {
        $pos = strpos($methodName, 'Count');
        $methodName = substr($methodName, 0, $pos);

        if ($this->_getConfig()->isValidDataSourceGetter($methodName) == false) {
            throw new FilterException('Getter ' . $methodName . ' does not found in map.');
        }

        return $this->_getConfig()->getDataByDataSourceGetter($methodName . 'Count', $this->_getCallParams($methodName), $this->_getParams());
    }


    private function _getCallParams($methodName)
    {
        $paramQS = $this->_getConfig()->getParamQsByDataSourceGetter($methodName);

        $params = $this->_getParams();

        if (isset($params[$paramQS])) {
            unset($params[$paramQS]);
        }

        return $params;
    }


    protected function _getParams(): array
    {
        return $this->_params;
    }


    protected function _getRemoveParamsQs(): array
    {
        return $this->_removeParamsQs;
    }


    public function getParams(): array
    {
        return $this->_getParams();
    }


    public function getRemoveParamsQs(): array
    {
        return $this->_getRemoveParamsQs();
    }


    private function _getConfig(): AbstractFilterConfig
    {
        if (is_null($this->_config) == true) {
            throw new FilterException('Config must be set. Use setConfig().');
        }

        return $this->_config;
    }


    public function getConfig(): AbstractFilterConfig
    {
        return $this->_getConfig();
    }


    protected function _setParams(array $validParams, array $params): void
    {
        foreach ($params as $key => $val) {
            if (in_array($key, $validParams) == false) {
                throw new FilterException('Illegal parameter: ' . $key, FilterException::ERR_ILLEGAL_PARAM);
            }
        }

        $this->_params = $params;
        $this->_validParams = $validParams;
    }


    private function _addTheAllElement(&$entities)
    {
        if (empty($entities) == false) {
            $class = $entities[0]::className();

            $options = $this->getConfig()->getAllElementOptions();
            $empty = new $class();
            $empty->id = $options['id'];
            $empty->name = $options['name'];
            array_unshift($entities, $empty);
        }
    }


    private function _getBehaviorBridge(): IFilterModelBehaviourBridge
    {
        if (is_null($this->_behaviorBridge) == true) {
            $className = $this->_getConfig()->getBehaviorBridgeClassName();
            $this->_behaviorBridge = new $className($this->_getConfig(), $this->_getParams(), $this->_getRemoveParamsQs());
            $this->_hookBehaviorBridgeCreation($this->_behaviorBridge);
        }

        return $this->_behaviorBridge;
    }


    protected function _hookBehaviorBridgeCreation(IFilterModelBehaviourBridge $behaviourBridge): IFilterModelBehaviourBridge
    {
        // $behaviourBridge->setSomething($something)
        return $behaviourBridge;
    }


    protected function _attachBehavior(&$entities)
    {
        $className = $this->_getConfig()->getBehaviorClassName();
        foreach ($entities as $entity) {
            if (($entity instanceof IFilterModel) == false) {
                throw new FilterException('entity ' . get_class($entity) . ' must be instance of IFilterModel.');
            }

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

