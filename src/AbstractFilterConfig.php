<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 29.09.2017
 * Time: 18:28
 */

namespace bezdelnique\yii2filter;


abstract class AbstractFilterConfig
{
    private $_dataSource;


    public function __construct(IFilterDataSource $dataSource)
    {
        $this->_setDataSource($dataSource);
    }


    private function _setDataSource(IFilterDataSource $dataSource)
    {
        $this->_dataSource = $dataSource;
    }


    protected function _getDataSource(): IFilterDataSource
    {
        if (is_null($this->_dataSource) == true) {
            throw new FilterException('dataSource must be set. Correct FilterConfig file.');
        }

        return $this->_dataSource;
    }


    public function getDataByDataSourceGetter(string $methodName, array $params, array $paramsAll)
    {
        return $this->_getDataSource()->{$methodName}($params, $paramsAll);
    }


    public function getParamQsByDataSourceGetter(string $dataSourceGetter): string
    {
        $paramQs = array_search($dataSourceGetter, $this->getMapParamQsToDataSourceGetter());
        if ($paramQs === false) {
            throw new FilterException('Association paramQs - DataSourceGetter not found. dataSourceGetter: ' . $dataSourceGetter . '.');
        }

        return $paramQs;
    }


    public function isValidDataSourceGetter(string $methodName): bool
    {
        return in_array($methodName, $this->getMapParamQsToDataSourceGetter());
    }


    public function getParamQsByClassName($className): string
    {
        $classNameShort = substr($className, strrpos($className, '\\') + 1);
        $map = $this->getMapClassNameToParamQs();

        if (array_key_exists($classNameShort, $map) == false) {
            throw new FilterException('Соответствие параметр-класс для класса ' . $classNameShort . ' не найдено.');
        }

        return $map[$classNameShort];
    }


    public function getBehaviorClassName(): string
    {
        return '\bezdelnique\yii2filter\FilterModelBehavior';
    }


    public function getBehaviorBridgeClassName(): string
    {
        return '\bezdelnique\yii2filter\FilterModelBehaviorBridge';
    }


    public function defaultAddTheAllElement(): bool
    {
        return true;
    }


    public function getAllElementOptions(): array
    {
        return [
            'id' => -1,
            'name' => 'All',
        ];
    }


    abstract public function getValidParamsQs(): array;


    abstract public function getMapClassNameToParamQs(): array;


    abstract public function getMapParamQsToDataSourceGetter(): array;
}

