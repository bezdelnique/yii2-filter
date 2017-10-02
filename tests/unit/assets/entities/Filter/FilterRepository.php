<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 27.06.17
 * Time: 13:58
 */

namespace tests\unit\assets\entities\Filter;


use bezdelnique\yii2app\entities\AbstractRepository;


class FilterRepository extends AbstractRepository
{
    protected function _getModelFinder()
    {
        return FilterModel::find();
    }


    /***************************************************************
     * Методы для работы фильтров
     **************************************************************/
    public function getHardwareTypeIdsByParams(array $params = [])
    {
        $o = $this->_getModelFinder();
        self::_setParams($o, $params, 'hardwareTypeId');
        return $o->selectHardwareTypeIds()->column();
    }


    public function getOperationSystemIdsByParams(array $params = [])
    {
        $o = $this->_getModelFinder();
        self::_setParams($o, $params, 'operationSystemId');
        return $o->selectOperationSystemIds()->column();
    }


    public function getOperationSystemBitIdsByParams(array $params = [])
    {
        $o = $this->_getModelFinder();
        self::_setParams($o, $params, 'operationSystemBitId');
        return $o->selectOperationSystemBitIds()->column();
    }


    public function getCompanyIdsByParams(array $params = [])
    {
        $o = $this->_getModelFinder();
        self::_setParams($o, $params, 'companyId');
        return $o->selectCompanyIds()->column();
    }


    public function getFileTypeIdsByParams(array $params = [])
    {
        $o = $this->_getModelFinder();
        self::_setParams($o, $params, 'fileTypeId');
        return $o->selectFileTypeIds()->column();
    }


    /**
     * @param FilterModel $o
     * @param array $params
     * @param string $unset Фильтр который надо исключить
     */
    protected function _setParams(FilterQuery $o, array $params, $paramNameForUnset)
    {
        /**
         * unset params
         */
        if (isset($params[$paramNameForUnset]) == true) {
            unset($params[$paramNameForUnset]);
        }


        /**
         * apply params
         */
        if (false == empty($params['companyId'])) {
            $o->andWhereCompanyId($params['companyId']);
        }

        if (false == empty($params['hardwareId'])) {
            $o->andWhereHardwareId($params['hardwareId']);
        }

        if (false == empty($params['hardwareTypeId'])) {
            $o->andWhereHardwareTypeId($params['hardwareTypeId']);
        }

        if (false == empty($params['operationSystemId'])) {
            $o->andWhereOperationSystemId($params['operationSystemId']);
        }

        if (false == empty($params['operationSystemBitId'])) {
            $o->andWhereOperationSystemBitId($params['operationSystemBitId']);
        }

        if (false == empty($params['fileTypeId'])) {
            $o->andWhereFileTypeId($params['fileTypeId']);
        }
    }
}


