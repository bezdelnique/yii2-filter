<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 21.06.17
 * Time: 17:20
 */

namespace tests\unit\assets\entities\OperationSystem;


use bezdelnique\yii2app\entities\AbstractRepository;


class OperationSystemRepository extends AbstractRepository
{
    protected function _getModelFinder()
    {
        return OperationSystemModel::find();
    }
}

