<?php

return [
		'user-management' => [		'title' => 'Church Online Dashboard',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'display-name' => 'Display name',			'description' => 'Description',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',			'sex' => 'Gender',		],	],
		'cells' => [		'title' => 'Cells',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'user' => 'User id',			'church' => 'Church id',		],	],
		'churches' => [		'title' => 'Churches',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'zone' => 'Zone',			'country' => 'Country',			'user' => 'User id',		],	],
		'medias' => [		'title' => 'Medias',		'created_at' => 'Time',		'fields' => [			'filename' => 'Filename',			'mime' => 'Mime',			'original-filename' => 'Original filename',		],	],
		'testimonies' => [		'title' => 'Testimonies',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'body' => 'Content',			'user' => 'User id',		],	],
		'partnerships' => [		'title' => 'Partnerships',		'created_at' => 'Time',		'fields' => [			'type' => 'Type',			'amount' => 'Amount',			'user' => 'User',			'church' => 'Church id',		],	],
	'qa_create' => 'Toevoegen',
	'qa_save' => 'Opslaan',
	'qa_edit' => 'Bewerken',
	'qa_view' => 'Bekijken',
	'qa_update' => 'Bijwerken',
	'qa_list' => 'Lijst',
	'qa_no_entries_in_table' => 'Geen inhoud gevonden',
	'custom_controller_index' => 'Custom controller index.',
	'qa_logout' => 'Logout',
	'qa_add_new' => 'Toevoegen',
	'qa_are_you_sure' => 'Ben je zeker?',
	'qa_back_to_list' => 'Terug naar lijst',
	'qa_dashboard' => 'Boordtabel',
	'qa_delete' => 'Verwijderen',
	'quickadmin_title' => 'ChurchOnline Dashboard',
];