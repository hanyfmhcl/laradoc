<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'members_management_create',
            ],
            [
                'id'    => 19,
                'title' => 'members_management_edit',
            ],
            [
                'id'    => 20,
                'title' => 'members_management_show',
            ],
            [
                'id'    => 21,
                'title' => 'members_management_delete',
            ],
            [
                'id'    => 22,
                'title' => 'members_management_access',
            ],
            [
                'id'    => 23,
                'title' => 'member_access',
            ],
            [
                'id'    => 24,
                'title' => 'documents_management_access',
            ],
            [
                'id'    => 25,
                'title' => 'document_create',
            ],
            [
                'id'    => 26,
                'title' => 'document_edit',
            ],
            [
                'id'    => 27,
                'title' => 'document_show',
            ],
            [
                'id'    => 28,
                'title' => 'document_delete',
            ],
            [
                'id'    => 29,
                'title' => 'document_access',
            ],
            [
                'id'    => 30,
                'title' => 'doc_create',
            ],
            [
                'id'    => 31,
                'title' => 'doc_edit',
            ],
            [
                'id'    => 32,
                'title' => 'doc_show',
            ],
            [
                'id'    => 33,
                'title' => 'doc_delete',
            ],
            [
                'id'    => 34,
                'title' => 'doc_access',
            ],
            [
                'id'    => 35,
                'title' => 'system_calendar_access',
            ],
            [
                'id'    => 36,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 37,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 38,
                'title' => 'trip_create',
            ],
            [
                'id'    => 39,
                'title' => 'trip_edit',
            ],
            [
                'id'    => 40,
                'title' => 'trip_show',
            ],
            [
                'id'    => 41,
                'title' => 'trip_delete',
            ],
            [
                'id'    => 42,
                'title' => 'trip_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
