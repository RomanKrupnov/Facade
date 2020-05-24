<?php


namespace Service\Order;


use Service\Billing\Exception\BillingException;
use Service\Billing\Transfer\Card;
use Service\Communication\Exception\CommunicationException;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\Order\Basket;
use Service\User\Security;
use Service\Order\CheckoutProcess;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class CheckoutFacade
{
    /**
     * @var \Service\Order\Basket
     */
    private $session;
    /**
     * @var Card
     */
    private $billing;
    /**
     * @var NullObject
     */
    private $discount;
    /**
     * @var Email
     */
    private $communication;
    /**
     * @var Security
     */
    private $security;


    /**
     * CheckoutFacade constructor.
     * @param Security $security
     * @param Card $billing
     * @param \Service\Order\Basket $session
     * @param NullObject $discount
     * @param Email $communication
     */
    public function __construct(Security $security,
                                Card $billing,
                                Basket $session,
                                NullObject $discount,
                                Email $communication
    )
    {
        $this->security = $security;
        $this->billing = $billing;
        $this->session = $session;
        $this->discount = $discount;
        $this->communication = $communication;


    }

    public function checkout(): void
    {
        $checkoutProcess = new CheckoutProcess;
        $this->$checkoutProcess->checkoutProcess($this->discount, $this->billing, $this->security, $this->communication);
    }

}