<?php

use App\Http\Controllers\Api\V1\Admin\DocApiController;
use App\Http\Controllers\Api\V1\Admin\DocumentApiController;
use App\Http\Controllers\Api\V1\Admin\MembersManagementApiController;
use App\Http\Controllers\Api\V1\Admin\PermissionApiController;
use App\Http\Controllers\Api\V1\Admin\RoleApiController;
use App\Http\Controllers\Api\V1\Admin\TripApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', PermissionApiController::class);

    // Roles
    Route::apiResource('roles', RoleApiController::class);

    // Users
    Route::apiResource('users', UserApiController::class);

    // Members Management
    Route::apiResource('members-managements', MembersManagementApiController::class);

    // Document
    Route::apiResource('documents', DocumentApiController::class);

    // Docs
    Route::post('docs/media', [DocApiController::class, 'storeMedia'])->name('docs.store_media');
    Route::apiResource('docs', DocApiController::class);

    // Trip
    Route::apiResource('trips', TripApiController::class);
});
