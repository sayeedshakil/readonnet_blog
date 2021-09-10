<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'name' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'name' => 'permission_create',
            ],
            [
                'id'    => '3',
                'name' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'name' => 'permission_show',
            ],
            [
                'id'    => '5',
                'name' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'name' => 'permission_access',
            ],
            [
                'id'    => '7',
                'name' => 'role_create',
            ],
            [
                'id'    => '8',
                'name' => 'role_edit',
            ],
            [
                'id'    => '9',
                'name' => 'role_show',
            ],
            [
                'id'    => '10',
                'name' => 'role_delete',
            ],
            [
                'id'    => '11',
                'name' => 'role_access',
            ],
            [
                'id'    => '12',
                'name' => 'user_create',
            ],
            [
                'id'    => '13',
                'name' => 'user_edit',
            ],
            [
                'id'    => '14',
                'name' => 'user_show',
            ],
            [
                'id'    => '15',
                'name' => 'user_delete',
            ],
            [
                'id'    => '16',
                'name' => 'user_access',
            ],
            [
                'id'    => '17',
                'name' => 'category_create',
            ],
            [
                'id'    => '18',
                'name' => 'category_edit',
            ],
            [
                'id'    => '19',
                'name' => 'category_show',
            ],
            [
                'id'    => '20',
                'name' => 'category_delete',
            ],
            [
                'id'    => '21',
                'name' => 'category_access',
            ],
            [
                'id'    => '22',
                'name' => 'change_password_access',
            ],
            [
                'id'    => '23',
                'name' => 'post_create',
            ],
            [
                'id'    => '24',
                'name' => 'post_edit',
            ],
            [
                'id'    => '25',
                'name' => 'post_show',
            ],
            [
                'id'    => '26',
                'name' => 'post_delete',
            ],
            [
                'id'    => '27',
                'name' => 'post_access',
            ],
            [
                'id'    => '28',
                'name' => 'post_review',
            ],
            [
                'id'    => '29',
                'name' => 'database_notification_access',
            ],
            [
                'id'    => '30',
                'name' => 'no_permissions',
            ],
            [
                'id'    => '31',
                'name' => 'post_for_other_access',
            ],
            [
                'id'    => '32',
                'name' => 'post_for_other_create',
            ],
            [
                'id'    => '33',
                'name' => 'post_for_other_edit',
            ],
            [
                'id'    => '34',
                'name' => 'post_for_other_delete',
            ],
            [
                'id'    => '35',
                'name' => 'profile_access',
            ],
            [
                'id'    => '36',
                'name' => 'profile_create',
            ],
            [
                'id'    => '37',
                'name' => 'profile_edit',
            ],
            [
                'id'    => '38',
                'name' => '	profile_delete',
            ],

        ];

        Permission::insert($permissions);
    }
}
