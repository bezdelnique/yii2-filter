<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 29.09.2017
 * Time: 22:04
 */

namespace tests\unit\assets\Samples\DatabaseMinimalConfig;


use bezdelnique\yii2filter\IFilterDataSource;
use tests\unit\assets\helpers\Registry\RegistryRepository;


class FilterDataSource implements IFilterDataSource
{
    public function getOperationSystems(array $params)
    {
        $ids = RegistryRepository::getFilterRepository()->getOperationSystemIdsByParams($params);
        $entities = RegistryRepository::getOperationSystemRepository()->getByIds($ids);
        return $entities;
    }


    public function getOperationSystemBits(array $params)
    {
        $ids = RegistryRepository::getFilterRepository()->getOperationSystemBitIdsByParams($params);
        $entities = RegistryRepository::getOperationSystemBitRepository()->getByIds($ids);
        return $entities;
    }


    public function getCompanies(array $params)
    {
        $ids = RegistryRepository::getFilterRepository()->getCompanyIdsByParams($params);
        $entities = RegistryRepository::getCompanyRepository()->getByIds($ids);
        return $entities;
    }


    public function getHardwareTypes(array $params)
    {
        $ids = RegistryRepository::getFilterRepository()->getHardwareTypeIdsByParams($params);
        $entities = RegistryRepository::getHardwareTypeRepository()->getByIds($ids);
        return $entities;
    }

    public function getFileTypes(array $params)
    {
        $ids = RegistryRepository::getFilterRepository()->getFileTypeIdsByParams($params);
        $entities = RegistryRepository::getFileTypeRepository()->getByIds($ids);
        return $entities;
    }
}

