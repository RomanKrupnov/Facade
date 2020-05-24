<?php

declare(strict_types = 1);

namespace Service\Discount;

class NullObject implements DiscountInterface
{
    /**
     * @return float
     */
    public function getDiscount(): float
    {
        // Скидка отсутствует
        return 0;
    }
}
