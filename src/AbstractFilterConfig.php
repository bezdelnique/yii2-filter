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


    protected function _getDataSource()
    {
        if (is_null($this->_dataSource) == true) {
            throw new FilterException('dataSource must be set. Correct FilterConfig file.');
        }

        return $this->_dataSource;
    }


    public function getDataByDataSourceGetter($methodName, $params)
    {
        return $this->_getDataSource()->{$methodName}($params);
    }


    protected function _getDataSourceGetterByParamName(string $paramName): string
    {
        if (array_key_exists($paramName, $this->getMapParamNameToDataSourceGetter()) == false) {
            throw new FilterException('Param ' . $paramName . ' does not found.');
        }

        return $this->getMapParamNameToDataSourceGetter()[$paramName];
    }


    public function getParamQsByDataSourceGetter(string $dataSourceGetter)
    {
        $paramNick = array_search($dataSourceGetter, $this->getMapParamNameToDataSourceGetter());
        return $this->getParamQsByParamNick($paramNick);
    }


    public function isValidDataSourceGetter(string $methodName): bool
    {
        return in_array($methodName, $this->getMapParamNameToDataSourceGetter());
    }


    abstract public static function getValidParams();


    abstract public static function getMapClassToParamName();


    abstract public static function getMapParamNameToDataSourceGetter();


    abstract public function getParamQsByParamNick(string $paramNick): string;


    abstract public function getParamQsByModelClassName($className): string;


    abstract public function getBehaviorClassName(): string;


    abstract public function getBehaviorBridgeClassName(): string;
}

