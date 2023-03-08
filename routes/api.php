<?php

use App\Http\Controllers\Api\V1\Admin\DocApiController;
use App\Http\Controllers\Api\V1\Admin\DocumentApiController;
use App\Http\Controllers\Api\V1\Admin\MembersManagementApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Members Management
    Route::apiResource('members-managements', MembersManagementApiController::class);

    // Document
    Route::apiResource('documents', DocumentApiController::class);

    // Docs
    Route::post('docs/media', [DocApiController::class, 'storeMedia'])->name('docs.store_media');
    Route::apiResource('docs', DocApiController::class);
});
