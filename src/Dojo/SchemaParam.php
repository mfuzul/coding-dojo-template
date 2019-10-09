<?php
/**
 * Created by PhpStorm.
 * User: mateo-gbb
 * Date: 2019-10-09
 * Time: 14:49
 */

namespace Dojo;


class SchemaParam
{
    const BOOLEAN = 1;

    const VALUE = 2;

    public $defaultValue;

    public $paramType;

    /**
     * SchemaParam constructor.
     *
     * @param $defaultValue
     * @param $paramType
     */
    public function __construct($defaultValue, $paramType)
    {
        $this->defaultValue = $defaultValue;
        $this->paramType = $paramType;
    }
}