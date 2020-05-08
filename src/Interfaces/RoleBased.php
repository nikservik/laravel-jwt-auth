<?php

namespace Nikservik\LaravelJwtAuth\Interfaces;

interface RoleBased
{
    public const ROLE_USER = 1;
    public const ROLE_EDITOR = 2;
    public const ROLE_ADMIN = 3;
    public const ROLE_SUPERADMIN = 4;
}