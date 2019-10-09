<?php
/**
 * Created by PhpStorm.
 * User: mateo-gbb
 * Date: 2019-10-09
 * Time: 14:15
 */

namespace Dojo;


class FizzBuzz
{
    public function forNumber(int $input)
    {
        if (0 === $input % 3) {
            return 'fizz';
        }

        return $input;
    }

}