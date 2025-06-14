<?php

namespace App\Repositories;

use App\Interface\UserProductListingInterface;
use App\Models\User;

class UserProductListingRepository implements UserProductListingInterface
{
   public function userWithProducts()
   {
      return User::with('products')->has('products');
   }

   public function userWithNoProduct()
   {
      return User::with('products')->doesntHave('products');
   }

   public function getUserWithProducts($perPage, $searchParams)
   {
      $query = $this->userWithProducts();

      if ($searchParams) {

         $query->search($searchParams);
      }

      return $query->paginate($perPage);
   }

   public function getUserWithNoProducts($perPage, $searchParams)
   {
      $query = $this->userWithNoProduct();

      if ($searchParams) {

         $query->search($searchParams);
      }


      return $query->paginate($perPage);
   }
}
