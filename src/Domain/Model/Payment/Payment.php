<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Payment;

interface Payment
{
    public function getName(): string;

    public function getType(): string;

    public function getIdentifier(): string;

    /**
     * tato metoda zavola tridu obstaravajici zpracovani platby
     */
    public function pay(float $price);
}
