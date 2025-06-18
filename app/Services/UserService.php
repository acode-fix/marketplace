<?php

namespace App\Services;

use App\Interface\UserInterface;

class UserService
{
    public function __construct(protected UserInterface $userInterface)
    {
      
    }


    public function getUsersWithoutShopNo(int $perPage,  ?string $search)
    {

       return  $this->userInterface->getUsersWithoutShopNo(perPage: $perPage, search:$search);

    }
}