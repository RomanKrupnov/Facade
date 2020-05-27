<?php


namespace Service\Product;


interface ComparatorInterface
{
    /**
     * @param $first
     * @param $second
     * @return int
     */
    public function compare($first,$second) :int;

}