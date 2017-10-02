<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 21.06.17
 * Time: 15:32
 */

namespace tests\unit\assets\entities\HardwareType;


use bezdelnique\yii2app\entities\AbstractRepository;


class HardwareTypeRepository extends AbstractRepository
{
    protected function _getModelFinder()
    {
        return HardwareTypeModel::find();
    }


    public function getByNick($nick)
    {
        $entity = $this->_getModelFinder()->where(['nick' => $nick])->one();

        return $entity;
    }
}

