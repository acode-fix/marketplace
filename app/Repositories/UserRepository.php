<?php

namespace App\Repositories;

use App\Interface\UserInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements UserInterface
{
  public function getUsersWithoutShopNo(int $perPage, ?string $search) : LengthAwarePaginator
  {
    $query = User::whereNull('shop_no');

    if ($search) {
      $query->search($search);
    }


    return $query->paginate($perPage);
  }
}
