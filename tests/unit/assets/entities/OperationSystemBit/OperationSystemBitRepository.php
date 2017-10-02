<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 21.06.17
 * Time: 23:51
 */

namespace tests\unit\assets\entities\OperationSystemBit;


use bezdelnique\yii2app\entities\AbstractRepository;


class OperationSystemBitRepository extends AbstractRepository
{
    protected function _getModelFinder()
    {
        return OperationSystemBitModel::find();
    }
}
