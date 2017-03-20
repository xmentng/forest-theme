<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permission = [
        	[
        		'name' => 'role-list',
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],
        	[
        		'name' => 'church-list',
        		'display_name' => 'Display Church Listing',
        		'description' => 'See only Listing Of Church'
        	],
        	[
        		'name' => 'church-create',
        		'display_name' => 'Create Church',
        		'description' => 'Create New Church'
        	],
        	[
        		'name' => 'church-edit',
        		'display_name' => 'Edit Church',
        		'description' => 'Edit Church'
        	],
        	[
        		'name' => 'church-delete',
        		'display_name' => 'Delete Church',
        		'description' => 'Delete Church'
        	],
        	[
        		'name' => 'cell-list',
        		'display_name' => 'Display Cell Listing',
        		'description' => 'See only Listing Of Item'
        	],
        	[
        		'name' => 'cell-create',
        		'display_name' => 'Create Cell',
        		'description' => 'Create New Cell'
        	],
        	[
        		'name' => 'cell-edit',
        		'display_name' => 'Edit Cell',
        		'description' => 'Edit Cell'
        	],
        	[
        		'name' => 'cell-delete',
        		'display_name' => 'Delete Cell',
        		'description' => 'Delete Cell'
        	],
        	[
        		'name' => 'transaction-list',
        		'display_name' => 'Display Transaction Listing',
        		'description' => 'See only Listing Of Transaction'
        	],
        	[
        		'name' => 'transaction-create',
        		'display_name' => 'Create Transaction',
        		'description' => 'Create New Transaction'
        	],
        	[
        		'name' => 'transaction-edit',
        		'display_name' => 'Edit Transaction',
        		'description' => 'Edit Church'
        	],
        	[
        		'name' => 'transaction-delete',
        		'display_name' => 'Delete Transaction',
        		'description' => 'Delete Transaction'
        	],
        	[
        		'name' => 'testimony-list',
        		'display_name' => 'Display Testimony Listing',
        		'description' => 'See only Listing Of Testimony'
        	],
        	[
        		'name' => 'testimony-create',
        		'display_name' => 'Create Testimony',
        		'description' => 'Create New Testimony'
        	],
        	[
        		'name' => 'testimony-edit',
        		'display_name' => 'Edit Testimony',
        		'description' => 'Edit Testimony'
        	],
        	[
        		'name' => 'testimony-delete',
        		'display_name' => 'Delete Testimony',
        		'description' => 'Delete Testimony'
        	]
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
