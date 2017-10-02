<?php
/**
 * Created by PhpStorm.
 * User: heman
 * Date: 28.09.2017
 * Time: 14:26
 */

namespace tests\unit\entities\HardwareType;


use tests\unit\assets\entities\HardwareType\HardwareTypeModel;

class HardwareTypeFixture
{
    const NOTEBOOKS_ID = 7;
    const AUDIO_SOUND_ID = 4;
    const GRAPHICS_VIDEO_ID = 3;


    public static function getGraphicsVideo(): HardwareTypeModel
    {
        return HardwareTypeModel::findOne(self::GRAPHICS_VIDEO_ID);
    }
}

