<?php

namespace App\Services;

use App\Helpers\Helper;
use App\Interface\UserInterface;
use App\Models\User;

class UserService
{
    public function __construct(protected UserInterface $userInterface, protected Helper $helper)
    {
      
    }


    public function getUsersWithoutShopNo(int $perPage,  ?string $search)
    {

       return  $this->userInterface->getUsersWithoutShopNo(perPage: $perPage, search:$search);

    }

    public function findUserById(int $userId)
    {
        return $this->userInterface->findUserById($userId);
    }


    public function generateUserShopNo(User $user)
    {     
         $shopNo = $this->helper->generateShopNo();
         $shopToken = $this->helper->generateShopToken();

        return  $this->storeUserShopNo(user:$user, shopNo: $shopNo, shopToken: $shopToken);

        
    }


    public function storeUserShopNo(User $user, int $shopNo, string $shopToken)
    {
       return $this->userInterface->updateUserShopNo(user:$user, shopNo: $shopNo, shopToken: $shopToken);

    }
}