<?php

namespace App\Http\Controllers;

use App\Models\LinkedSocialAccount;
use App\Models\Shop;
use App\Models\User;
use App\Traits\HasApiResponse;
use DebugBar\DebugBar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{
    use HasApiResponse;
    /**
     * Function: Google login
     * Description: This will redirect to google
     * @param NA
     * @return void
     */

    public function redirect($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * 
     * Function: Google authentication
     * Description: This function will authenticate the user via google account
     */
    public function handleProviderCallback(Request $request, $provider)
    {

        try {

            // Get the user from the Google/Microsoft callback
            $providerUser = Socialite::driver($provider)->stateless()->user();
            
        } catch (Exception $e) {

            Log::error(message: 'Provider error : ' . $e->getMessage());

            return $this->errorResponse(
                message: 'Failed to Login try again',
                statusCode: Response::HTTP_BAD_REQUEST
            );
        }

        if ($providerUser && $providerUser->getEmail()) {

            $user = $this->findOrCreate($providerUser, $provider);

             if ($user->user_type == -2) {
                return $this->errorResponse(
                    message: 'Account suspended, contact support!!',
                    statusCode: Response::HTTP_FORBIDDEN
                );
            }

             
            if ($user && $user->trashed()) {
                return $this->errorResponse(
                message: 'You account has been deleted',
                statusCode: Response::HTTP_FORBIDDEN,
            );
            }

            
        } else {
            return $this->errorResponse(
                message: 'Failed to login try again',
                statusCode: Response::HTTP_UNAUTHORIZED,
            );
        }


        $token = $user->createToken(env('APP_NAME', 'API TOKEN'))->plainTextToken;

        return redirect(config('app.url') . "/settings?success=You+have+successfully+logged+in&token={$token}&user={$user->id}");
    }


    protected function findOrCreate($providerUser, string $provider)
    {
        $linkedSocialAccount = LinkedSocialAccount::query()->where('provider_name', $provider)->where('provider_id', $providerUser->getId())->first();

        if ($linkedSocialAccount) {
            
            return $linkedSocialAccount->user;
        } else {
            $user = null;

            if ($email = $providerUser->email) {
                $user = User::withTrashed()->where('email', $email)->first();
            }

            if ($user && $user->trashed()) {

                return $user;
            }



            if (!$user) {
                $user = User::query()->create([
                    'name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
                    'shop_token' => Shop::shopToken(50),
                    'shop_no' => Shop::shopNo(),
                    'password' => Hash::make(1234),
                ]);
            }

            $user->linkedSocialAccounts()->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider,
            ]);


            return $user;
        }
    }
}
