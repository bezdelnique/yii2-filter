<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 30.09.2017
 * Time: 15:27
 */

namespace bezdelnique\yii2filter;


interface IFilterBehavior
{
    public function filterGetBaseUrl(): string;
    public function filterGetQueryParams(): array;
    public function filterIsChecked(): bool;
}

