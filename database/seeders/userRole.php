<?php

namespace Database\Seeders;

enum userRole: string
{
    case SUPER_ADMIN = 'super_admin';
    case INVENTORY_MANAGER = 'inventory_manager';
    case INVENTORY_USER = 'inventory_user';

    public function label(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'super_admin',
            self::INVENTORY_MANAGER => 'inventory_manager',
            self::INVENTORY_USER => 'inventory_user',
        };
    }
}
