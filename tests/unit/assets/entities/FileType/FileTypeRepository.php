<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 28.06.17
 * Time: 21:54
 */

namespace tests\unit\assets\entities\FileType;


use bezdelnique\yii2app\entities\AbstractRepository;

class FileTypeRepository extends AbstractRepository
{
    protected function _getModelFinder()
    {
        return FileTypeModel::find();
    }
}

