<?php

namespace App\Interface;


interface UserProductListingInterface 
{
  public function getUserWithProducts($perPage, $searchParams);

  public function getUserWithNoProducts($perPage, $searchParams);
}