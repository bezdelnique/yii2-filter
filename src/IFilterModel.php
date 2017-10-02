<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 30.09.2017
 * Time: 01:02
 */

namespace bezdelnique\yii2filter;


interface IFilterModel
{
    public function attachBehavior($name, $behavior);
}

