<?php

namespace App\Enums;

enum InvoiceStatus: string
{
  case PENDING = 'pending';
  case SUCCESS = 'success';
  case FAILED = 'failed';

    public static function values()
    {
        return array_column(self::cases(), 'value');
    }
}