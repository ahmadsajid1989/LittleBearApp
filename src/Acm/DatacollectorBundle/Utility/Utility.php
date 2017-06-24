<?php

namespace Acm\DatacollectorBundle\Utility;

/**
 * Created by PhpStorm.
 * User: Ahmad
 * Date: 6/24/2017
 * Time: 11:41 AM.
 */
class Utility
{
    public static function generateCode()
    {
        $length = 11;
        $chrDb = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $str = '';
        for ($count = 0; $count < $length; ++$count) {
            $chr = $chrDb[random_int(0, count($chrDb) - 1)];

            if (random_int(0, 1) == 0) {
                $chr = strtoupper($chr);
            }
            $str .= $chr;
        }

        return $str;
    }
}
