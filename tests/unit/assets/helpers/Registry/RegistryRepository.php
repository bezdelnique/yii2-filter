<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 29.06.17
 * Time: 21:04
 */

namespace tests\unit\assets\helpers\Registry;

use bezdelnique\yii2app\entities\AbstractRepositoryCacher;
use bezdelnique\yii2app\helpers\AbstractRegistry;
use tests\unit\assets\entities\Company\CompanyRepository;
use tests\unit\assets\entities\FileType\FileTypeRepository;
use tests\unit\assets\entities\Filter\FilterRepository;
use tests\unit\assets\entities\HardwareType\HardwareTypeRepository;
use tests\unit\assets\entities\OperationSystem\OperationSystemRepository;
use tests\unit\assets\entities\OperationSystemBit\OperationSystemBitRepository;


class RegistryRepository extends AbstractRegistry
{
    static protected $_instances = [];


    static public function getCompanyRepository(): CompanyRepository
    {
        $instanceKey = 'CompanyRepository';
        if (static::exists($instanceKey) == true) {
            $repository = static::get($instanceKey);
        } else {
            $repository = new CompanyRepository();
            $cacher = new AbstractRepositoryCacher($repository);
            $repository->setCacher($cacher);
            static::set($instanceKey, $repository);
        }

        return $repository;
    }


    static public function getFileTypeRepository(): FileTypeRepository
    {
        $instanceKey = 'FileTypeRepository';
        if (static::exists($instanceKey) == true) {
            $repository = static::get($instanceKey);
        } else {
            $repository = new FileTypeRepository();
            $cacher = new AbstractRepositoryCacher($repository);
            $repository->setCacher($cacher);
            static::set($instanceKey, $repository);
        }

        return $repository;
    }


    static public function getHardwareTypeRepository(): HardwareTypeRepository
    {
        $instanceKey = 'HardwareTypeRepository';
        if (static::exists($instanceKey) == true) {
            $repository = static::get($instanceKey);
        } else {
            $repository = new HardwareTypeRepository();
            $cacher = new AbstractRepositoryCacher($repository);
            $repository->setCacher($cacher);
            static::set($instanceKey, $repository);
        }

        return $repository;
    }


    static public function getOperationSystemRepository(): OperationSystemRepository
    {
        $instanceKey = 'OperationSystemRepository';
        if (static::exists($instanceKey) == true) {
            $repository = static::get($instanceKey);
        } else {
            $repository = new OperationSystemRepository();
            $cacher = new AbstractRepositoryCacher($repository);
            $repository->setCacher($cacher);
            static::set($instanceKey, $repository);
        }

        return $repository;
    }


    static public function getOperationSystemBitRepository(): OperationSystemBitRepository
    {
        $instanceKey = 'OperationSystemBitRepository';
        if (static::exists($instanceKey) == true) {
            $repository = static::get($instanceKey);
        } else {
            $repository = new OperationSystemBitRepository();
            $cacher = new AbstractRepositoryCacher($repository);
            $repository->setCacher($cacher);
            static::set($instanceKey, $repository);
        }

        return $repository;
    }


    static public function getFilterRepository(): FilterRepository
    {
        $instanceKey = 'FilterRepository';
        if (static::exists($instanceKey) == true) {
            $repository = static::get($instanceKey);
        } else {
            $repository = new FilterRepository();
            $cacher = new AbstractRepositoryCacher($repository);
            $repository->setCacher($cacher);
            static::set($instanceKey, $repository);
        }

        return $repository;
    }
}

