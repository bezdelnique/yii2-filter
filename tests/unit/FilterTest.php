<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 29.09.2017
 * Time: 18:20
 */

namespace tests\unit;



class FilterTest extends FilterAbstract
{
    public function testGetCompanies()
    {
        $filter = $this->_getConfiguredFilter();
        $companies = $filter->getCompanies();
        verify($companies)->count(16);
        verify($companies[0]->getId())->equals(-1);
        verify($companies[1]->getName())->equals('Amd');
    }


    public function testGetFileTypes()
    {
        $filter = $this->_getConfiguredFilter();
        $fileTypes = $filter->getFileTypes();
        verify($fileTypes)->count(6);
        verify($fileTypes[0]->getId())->equals(-1);
        verify($fileTypes[1]->getName())->equals('Driver');
    }


    public function testGetHardwareTypesCheckedFalse()
    {
        $filter = $this->_getConfiguredFilter();
        $hardwareTypes = $filter->getHardwareTypes();
        verify($hardwareTypes)->count(20);
        verify($hardwareTypes[0]->getId())->equals(-1);
        verify($hardwareTypes[1]->getName())->equals('Chipsets');
        verify($hardwareTypes[1]->filterIsChecked())->false();
    }


    public function testGetHardwareTypesCheckedTrue()
    {
        $filter = $this->_getConfiguredFilter();
        $hardwareTypes = $filter->getHardwareTypes();
        verify($hardwareTypes[2]->getName())->equals('Graphics & Video');
        verify($hardwareTypes[2]->getId())->equals(3);
        verify($hardwareTypes[2]->filterIsChecked())->true();
    }


    public function testGetHardwareTypesSpecialCase()
    {
        $filter = $this->_getConfiguredFilter();
        $hardwareTypes = $filter->getHardwareTypes();

        verify($hardwareTypes[0]->filterGetQueryParams())->equals([
            // 'hardwareTypeId' => null,
            'operationSystemBitId' => null,
            'companyId' => null,
            'operationSystemId' => null,
        ]);

        verify($hardwareTypes[1]->filterGetQueryParams())->equals([
            'hardwareTypeId' => 2,
            'operationSystemBitId' => null,
            'companyId' => null,
            'operationSystemId' => null,
        ]);

    }


    public function testGetOperationSystems()
    {
        $filter = $this->_getConfiguredFilter();
        $operationSystems = $filter->getOperationSystems();
        verify($operationSystems)->count(16);
        verify($operationSystems[0]->getId())->equals(-1);
        verify($operationSystems[1]->getName())->equals('Windows Vista');
    }


    public function testGetOperationSystemBits()
    {
        $filter = $this->_getConfiguredFilter();
        $operationSystemBits = $filter->getOperationSystemBits();
        verify($operationSystemBits)->count(3);
        verify($operationSystemBits[0]->getId())->equals(-1);
        verify($operationSystemBits[1]->getName())->equals('64');
    }


    public function testFilterGetQueryParams()
    {
        $filter = $this->_getConfiguredFilter();
        $operationSystems = $filter->getOperationSystems();
        verify($operationSystems[0]->getId())->equals(-1);
        verify($operationSystems[1]->filterGetQueryParams())->equals([
            'hardwareTypeId' => 3,
            'operationSystemBitId' => null,
            'companyId' => null,
            'operationSystemId' => 12,
        ]);
    }
}

