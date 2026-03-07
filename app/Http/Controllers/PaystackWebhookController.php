<?php

namespace App\Http\Controllers;

use App\Enums\WebhookEvent;
use App\Helpers\Helper;
use App\Models\Subscription;
use App\Services\PaystackWebhookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PaystackWebhookController extends Controller
{  
    
    public function handle(Request $request, PaystackWebhookService $service) 
    {  
        Log::info($request->all());
        

        if(! $service->verifySignature(request: $request)){
            return $this->errorResponse(
                message: 'Invalid signature',
                statusCode:Response::HTTP_BAD_REQUEST
            );
        }

        $service->handle($request->input('event'), $request->input('data'));
        
        return $this->successResponse(
            message: 'Webhook event handled',
            statusCode: Response::HTTP_OK
        );


    }

}
