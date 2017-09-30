<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 30.09.2017
 * Time: 19:10
 */

namespace bezdelnique\Filter;


use bezdelnique\Filter\Subdir\SubdirSomeClass;

class Filter
{

    public function __construct()
    {
        $a = new SubdirSomeClass();
        $b = new SameLevelSomeClass();
    }
}

