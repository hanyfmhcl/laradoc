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
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 37,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 38,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 39,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 40,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 41,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 42,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 43,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 44,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 45,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 46,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 47,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 48,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 49,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 50,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 51,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 52,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 53,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 54,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 55,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 56,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 57,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 58,
                'title' => 'audit_log_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
