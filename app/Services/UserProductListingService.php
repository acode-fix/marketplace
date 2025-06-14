<?php

namespace App\Services;

use App\Interface\UserProductListingInterface;
use GuzzleHttp\Psr7\Request;

class UserProductListingService
{
  public function __construct(public UserProductListingInterface $userProductListingInterface) {}


  public function getUserWithProducts($perPage, $searchParams)
  {
    return $this->userProductListingInterface->getUserWithProducts(perPage: $perPage, searchParams: $searchParams);
  }

  public function getUserWithNoProducts($perPage, $searchParams)
  {
    return $this->userProductListingInterface->getUserWithNoProducts(perPage: $perPage, searchParams: $searchParams);
  }

  
}
