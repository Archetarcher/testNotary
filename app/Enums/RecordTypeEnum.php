<?php

namespace App\Enums;

use App\Enums\Abstr\DictionaryEnum;
use App\Position;
use App\ProfileGroup;
use App\User;

class RecordTypeEnum
{
    const ATTORNEY = 1;
    const HERITAGE = 2;
    const REFERENCE = 3;

    const VALUES = [
        self::ATTORNEY => 'доверенность',
        self::HERITAGE => 'наследство',
        self::REFERENCE => 'справка',
    ];
}
