<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Checkout;

class Checkout
{
    private \Wratche\App\Domain\Model\Cart\Cart $cart;

    private \Wratche\App\Domain\Model\Payment\Payment $payment;

    public function __construct(
        \Wratche\App\Domain\Model\Cart\Cart $cart,
        \Wratche\App\Domain\Model\Payment\Payment $payment
    ) {
        $this->cart = $cart;
        $this->payment = $payment;
    }

    public function getPrice(): float
    {
        return $this->cart->getPrice();
    }

    public function pay(): void
    {
        $this->payment->pay($this->getPrice());
    }
}
