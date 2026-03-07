<?php

namespace App\Enums;

enum SubscriptionStatus: string
{
    case ACTIVE = 'active';
    case NON_RENEWING = 'non-renewing';

    case PAST_DUE = 'past_due';

    case CANCELLED = 'cancelled';
    case ATTENTION = 'attention';
    case COMPLETED = 'completed';


    public static function values()
    {
        return array_column(self::cases(), 'value');
    }
}

