<?php

namespace App\Enums;

enum PaystackSubscriptionPlan: string
{

  case MONTHLY = 'monthly';
  case YEARLY = 'annually';


  public function label(): string
  {
    return match ($this) {
      self::MONTHLY => 'Monthly Plan',
      self::YEARLY => 'Yearly Plan'
    };
  }

  public function amount(): int
  {
    return match ($this) {
      self::MONTHLY => 1000 * 100,
      self::YEARLY  => 10000 * 100
    };
  }

  public function interval(): string
  {
    return $this->value;
  }
}
