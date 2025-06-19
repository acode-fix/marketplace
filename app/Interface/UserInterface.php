<?php

namespace App\Interface;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserInterface
{
  public function getUsersWithoutShopNo(int $perPage, ?string $search): LengthAwarePaginator;

  public function findUserById(int $userId): User;

  public function updateUserShopNo(User $user, int $shopNo, string $shopToken);
}
