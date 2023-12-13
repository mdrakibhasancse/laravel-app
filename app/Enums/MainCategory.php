<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MainCategory extends Enum
{
    const Menswear =   0;
    const Womenswear =   1;
    const Electronics = 2;

        public static function getDescription($value): string
        {
            if ($value === self::Menswear) {
                return "MEN'S WEAR";
            }else if ($value === self::Womenswear) {
                return "WOMEN'S WEAR";
            }

            return parent::getDescription($value);
        }
}
