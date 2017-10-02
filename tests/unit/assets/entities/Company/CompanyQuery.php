<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 22.06.17
 * Time: 1:27
 */

namespace tests\unit\assets\entities\Company;


use bezdelnique\yii2app\entities\AbstractQuery;

class CompanyQuery extends AbstractQuery
{
    public function andWhereNick(string $nick)
    {
        return $this->_andWhereByField('nick', $nick);
    }
}

