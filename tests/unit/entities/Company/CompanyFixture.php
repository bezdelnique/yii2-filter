<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 28.09.2017
 * Time: 14:32
 */

namespace tests\unit\entities\Company;

use tests\unit\assets\entities\Company\CompanyModel;

class CompanyFixture
{
    const AMD_ID = 1;
    const MSI_ID = 9;


    public static function getMSI(): CompanyModel
    {
        return CompanyModel::findOne(self::MSI_ID);
    }
}

