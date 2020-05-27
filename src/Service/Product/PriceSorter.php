<?php


namespace Service\Product;

use Model\Entity\Product;
use Service\Product\ComparatorInterface;

class PriceSorter
{
    /**
     * @var ComparatorInterface
     */
    private $comparator;

    /**
     * PriceSorter constructor.
     * @param \Service\Product\ComparatorInterface $comparator
     */
    public function __construct(ComparatorInterface $comparator)
    {
        $this->comparator = $comparator;
    }

    /**
     * @param  Product[] $product
     * @return Product []
     */

    public function sort(array $product): array
    {
        usort($product, [$this->comparator, 'compare']);

        return $product;

    }


}