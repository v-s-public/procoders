<?php


namespace App\Helpers;


class ArrayHelper
{

    /**
     * Random value from array
     *
     * @param array $array
     * @return mixed
     */
    public static function getRandomValue(array $array)
    {
        return $array[rand(0, count($array) - 1)];
    }
}
