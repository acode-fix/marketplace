<?php

namespace App\Interface;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserInterface
{
 public function getUsersWithoutShopNo( int $perPage, ?string $search) : LengthAwarePaginator;


}