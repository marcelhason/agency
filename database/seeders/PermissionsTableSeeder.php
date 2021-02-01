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
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'client_create',
            ],
            [
                'id'    => 18,
                'title' => 'client_edit',
            ],
            [
                'id'    => 19,
                'title' => 'client_show',
            ],
            [
                'id'    => 20,
                'title' => 'client_delete',
            ],
            [
                'id'    => 21,
                'title' => 'client_access',
            ],
            [
                'id'    => 22,
                'title' => 'project_create',
            ],
            [
                'id'    => 23,
                'title' => 'project_edit',
            ],
            [
                'id'    => 24,
                'title' => 'project_show',
            ],
            [
                'id'    => 25,
                'title' => 'project_delete',
            ],
            [
                'id'    => 26,
                'title' => 'project_access',
            ],
            [
                'id'    => 27,
                'title' => 'project_type_create',
            ],
            [
                'id'    => 28,
                'title' => 'project_type_edit',
            ],
            [
                'id'    => 29,
                'title' => 'project_type_show',
            ],
            [
                'id'    => 30,
                'title' => 'project_type_delete',
            ],
            [
                'id'    => 31,
                'title' => 'project_type_access',
            ],
            [
                'id'    => 32,
                'title' => 'task_create',
            ],
            [
                'id'    => 33,
                'title' => 'task_edit',
            ],
            [
                'id'    => 34,
                'title' => 'task_show',
            ],
            [
                'id'    => 35,
                'title' => 'task_delete',
            ],
            [
                'id'    => 36,
                'title' => 'task_access',
            ],
            [
                'id'    => 37,
                'title' => 'setting_access',
            ],
            [
                'id'    => 38,
                'title' => 'data_management_access',
            ],
            [
                'id'    => 39,
                'title' => 'status_create',
            ],
            [
                'id'    => 40,
                'title' => 'status_edit',
            ],
            [
                'id'    => 41,
                'title' => 'status_show',
            ],
            [
                'id'    => 42,
                'title' => 'status_delete',
            ],
            [
                'id'    => 43,
                'title' => 'status_access',
            ],
            [
                'id'    => 44,
                'title' => 'comment_create',
            ],
            [
                'id'    => 45,
                'title' => 'comment_edit',
            ],
            [
                'id'    => 46,
                'title' => 'comment_show',
            ],
            [
                'id'    => 47,
                'title' => 'comment_delete',
            ],
            [
                'id'    => 48,
                'title' => 'comment_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
