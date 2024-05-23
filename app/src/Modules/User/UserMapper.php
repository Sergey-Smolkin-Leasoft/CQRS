<?php

declare(strict_types=1);

namespace App\Modules\User;

use App\Application\Queries\Dto\UserDTO;

final class UserMapper
{
    public function toDto(\App\Modules\User\Entity\User $user): UserDTO
    {
        return new UserDTO(
            $user->id,
            $user->name,
            $user->email,
            $user->isActive,
        );
    }
}