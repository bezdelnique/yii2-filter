<?php

namespace tests\unit\assets\entities\Filter;

use bezdelnique\yii2app\entities\AbstractQuery;
use tests\unit\assets\entities\Company\CompanyModel;
use tests\unit\assets\entities\FileType\FileTypeModel;
use tests\unit\assets\entities\HardwareType\HardwareTypeModel;
use tests\unit\assets\entities\OperationSystem\OperationSystemModel;


/**
 * This is the ActiveQuery class for [[FilterModel]].
 *
 * @see FilterModel
 */
class FilterQuery extends AbstractQuery
{
    protected $_joinHardwareType = false;
    protected $_joinFileType = false;
    protected $_joinHardware = false;
    protected $_joinCompany = false;
    protected $_joinOperationSystem = false;


    /****************************************************************************
     * join
     ****************************************************************************/

    public function joinHardwareType()
    {
        if ($this->_joinHardwareType == false) {
            $tableName = $this->getModelTableName();

            $this->innerJoin([HardwareTypeModel::tableName() . ' hardware_type'], "hardware_type.Id = {$tableName}.hardwareTypeId");
            $this->addSelect([
                'hardwareTypeName' => 'hardware_type.name',
            ]);

            $this->_joinHardwareType = true;
        }

        return $this;
    }


    public function joinFileType()
    {
        if ($this->_joinFileType == false) {
            $tableName = $this->getModelTableName();

            $this->innerJoin([FileTypeModel::tableName() . ' file_type'], "file_type.Id = {$tableName}.fileTypeId");
            $this->addSelect([
                'fileTypeName' => 'fileType.name',
            ]);

            $this->_joinFileType = true;
        }

        return $this;
    }


    public function joinCompany()
    {
        if ($this->_joinCompany == false) {
            $tableName = $this->getModelTableName();

            $this->innerJoin([CompanyModel::tableName() . ' company'], "company.Id = {$tableName}.companyId");
            $this->addSelect([
                'companyName' => 'company.name',
            ]);

            $this->_joinCompany = true;
        }

        return $this;
    }


    public function joinOperationSystem()
    {
        if ($this->_joinOperationSystem == false) {
            $tableName = $this->getModelTableName();

            $this->innerJoin([OperationSystemModel::tableName() . ' operation_system'], "operation_system.Id = {$tableName}.operationSystemId");
            $this->addSelect([
                'operationSystemName' => 'operation_system.name',
            ]);

            $this->_joinOperationSystem = true;
        }

        return $this;
    }


    /****************************************************************************
     * select
     ****************************************************************************/
    public function selectCompanyIds($asArray = true)
    {
        return $this->_distinctByField('companyId', $asArray);
    }


    public function selectHardwareTypeIds($asArray = true)
    {
        return $this->_distinctByField('hardwareTypeId', $asArray);
    }


    public function selectOperationSystemIds($asArray = true)
    {
        return $this->_distinctByField('operationSystemId', $asArray);
    }


    public function selectOperationSystemBitIds($asArray = true)
    {
        return $this->_distinctByField('operationSystemBitId', $asArray);
    }


    public function selectFileTypeIds($asArray = true)
    {
        return $this->_distinctByField('fileTypeId', $asArray);
    }


    protected function _distinctByField($field, $asArray = true)
    {
        $this->select($field)->distinct();

        if ($asArray == true) {
            $this->asArray();
        }

        return $this;
    }


    /****************************************************************************
     * where
     ****************************************************************************/
    public function andWhereCompanyId($ids)
    {
        return $this->_andWhereByField('companyId', $ids);
    }


    public function andWhereHardwareId($ids)
    {
        return $this->_andWhereByField('hardwareId', $ids);
    }


    public function andWhereHardwareTypeId($ids)
    {
        return $this->_andWhereByField('hardwareTypeId', $ids);
    }


    public function andWhereOperationSystemId($ids)
    {
        return $this->_andWhereByField('operationSystemId', $ids);
    }


    public function andWhereOperationSystemBitId($ids)
    {
        return $this->_andWhereByField('operationSystemBitId', $ids);
    }


    public function andWhereFileTypeId($ids)
    {
        return $this->_andWhereByField('fileTypeId', $ids);
    }


    /****************************************************************************
     * order by
     ****************************************************************************/
    public function orderByHardwareTypeName()
    {
        return $this->joinHardwareType()->orderBy('hardware_type.name asc');
    }
}

