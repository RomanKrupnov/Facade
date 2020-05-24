<?php


namespace Service\Order;


use Service\Billing\BillingInterface;
use Service\Billing\Exception\BillingException;
use Service\Communication\CommunicationInterface;
use Service\Communication\Exception\CommunicationException;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class CheckoutProcess
{
    private $basket;
    private $discount;
    private $billing;
    private $security;
    private $communication;

    public function __construct(Basket $basket,
                                DiscountInterface $discount,
                                BillingInterface $billing,
                                SecurityInterface $security,
                                CommunicationInterface $communication)
    {
        $this->basket = $basket;
        $this->discount = $discount;
        $this->billing = $billing;
        $this->security = $security;
        $this->communication = $communication;

    }

    /**
     * @throws BillingException
     * @throws CommunicationException
     */
    public function checkoutProcess(): void
    {
        $totalPrice = 0;
        foreach ($this->basket->getProductsInfo() as $product) {
            $totalPrice += $product->basket->getPrice();
        }

        $discount = $this->discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $this->billing->pay($totalPrice);

        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }

}