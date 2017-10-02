<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 19.06.17
 * Time: 19:44
 */

namespace tests\unit\assets\entities\Company;


use bezdelnique\yii2app\entities\AbstractRepository;

class CompanyRepository extends AbstractRepository
{
    public function getByNick($nick)
    {
        return $this->_getModelFinder()->andWhereNick($nick)->one();
    }


    protected function _getModelFinder()
    {
        return CompanyModel::find();
    }
}

