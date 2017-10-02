<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 30.09.2017
 * Time: 15:52
 */

namespace bezdelnique\yii2filter;


interface IFilterModelBehavior
{
    public function filterGetQueryParams(): array;
    public function filterIsChecked(): bool;
}

