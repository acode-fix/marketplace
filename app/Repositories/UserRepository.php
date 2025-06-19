<?php

namespace App\Repositories;

use App\Interface\UserInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements UserInterface
{
  public function getUsersWithoutShopNo(int $perPage, ?string $search): LengthAwarePaginator
  {
    $query = User::Where('user_type', 2)->whereNull('shop_no');

    if ($search) {
      $query->search($search);
    }


    return $query->paginate($perPage);
  }


  public function findUserById(int $userId): User
  {
    return User::find($userId);
  }

  public function updateUserShopNo(User $user, int $shopNo, string $shopToken)
  {
    $user->shop_no = $shopNo;
    $user->shop_token = $shopToken;

    if ($user->save()) {
      return $user;
    }

    return null;
  }
}
