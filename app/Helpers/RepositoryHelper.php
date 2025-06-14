<?php

namespace App\Helpers;

use App\Repositories\UserProductListingRepository;

class RepositoryHelper
{
  public function __construct(private UserProductListingRepository $userProductListingRepository)
  {
      
  }


  public function getUserWithProducts()
  {
    return $this->userProductListingRepository->userWithProducts();
  }

   public function getUserWithNoProduct()
  {
    return $this->userProductListingRepository->userWithNoProduct();
  }
}