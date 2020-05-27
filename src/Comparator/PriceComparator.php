<?php

declare(strict_types=1);

namespace Comparator;


use Model\Entity\Product;
use Service\Product\ComparatorInterface;


class PriceComparator implements ComparatorInterface
{
    public function compare($first, $second):int
    {
        $product = new Product;
        return $first->$product->getPrice() <=> $second->$product->getPrice();

    }
}