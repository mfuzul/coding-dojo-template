<?php
/**
 * Created by PhpStorm.
 * User: mateo-gbb
 * Date: 2019-10-09
 * Time: 14:36
 */

namespace Dojo;


class ArgsParser
{

    public function parse(string $input, array $schema)
    {
        $return = [];
        $readingValue = false;
        $lastFlag = null;

        for ($i = 0; $i < strlen($input); $i++) {
            if (' ' === $input[$i] && '-' === $input[$i+1]) {
                $readingValue = false;
                continue;
            }

            if ($readingValue) {
                $return[$lastFlag] .= $input[$i];
            } else {
                if ('-' === $input[$i]) {
                    $flag = $input[$i+1];

                    if (array_key_exists($flag, $schema)) {
                        $lastFlag = $flag;

                        if (SchemaParam::BOOLEAN === $schema[$flag]->paramType) {
                            $return[$lastFlag] = null;
                        } else {
                            $return[$lastFlag] = '';
                            $readingValue = true;
                        }
                    }

                    $i++;
                }
            }
        }

        foreach ($return as $flag => &$value) {
            $value = trim($value);

            if ('' === $value) {
                $value = $schema[$flag]->defaultValue;
            }
        }

        return $return;
    }
}