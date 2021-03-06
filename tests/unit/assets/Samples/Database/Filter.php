<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 27.06.17
 * Time: 13:57
 */

namespace tests\unit\assets\Samples\Database;


use bezdelnique\yii2filter\AbstractFilter;


/**
 * Class Filter
 * @package app\components\Filter
 *
 * @method array getOperationSystems()
 * @method array getOperationSystemsWithoutAll()
 *
 * @method array getOperationSystemBits()
 * @method array getOperationSystemBitsWithoutAll()
 *
 * @method array getHardwareTypes()
 * @method array getHardwareTypesWithoutAll()
 *
 * @method array getCompanies()
 * @method array getCompaniesWithoutAll()
 *
 * @method array getFileTypes()
 * @method array getFileTypesWithoutAll()
 */
class Filter extends AbstractFilter
{
    public function removeParamCompanyId()
    {
        return $this->removeParamFromQueryString('companyId');
    }


    public function removeParamHardwareId()
    {
        return $this->removeParamFromQueryString('hardwareId');
    }


    public function removeParamHardwareTypeId()
    {
        return $this->removeParamFromQueryString('hardwareTypeId');
    }
}

