<?php

use Nikservik\LaravelJwtAuth\AuthController;
use Nikservik\LaravelJwtAuth\PasswordRemindController;
use Nikservik\LaravelJwtAuth\VerificationController;

VerificationController::apiRoutes();
PasswordRemindController::apiRoutes();
AuthController::apiRoutes();
