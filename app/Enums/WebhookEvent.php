<?php

namespace App\Enums;

enum WebhookEvent: string
{
  case SUBSCRIPTION_CREATE = 'subscription.create';

  case CHARGE_SUCCESS = 'charge.success';

  case INVOICE_CREATE = 'invoice.create';

  case INVOICE_UPDATE = 'invoice.update';

  case INVOICE_PAYMENT_FAILED = 'invoice.payment_failed';

  case SUBSCRIPTION_NOT_RENEW = 'subscription.not_renew';

  case SUBSCRIPTION_DISABLE = 'subscription.disable';
}
