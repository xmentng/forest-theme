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
	'qa_save' => 'Išsaugoti',
	'qa_update' => 'Atnaujinti',
	'qa_list' => 'Sąrašas',
	'qa_no_entries_in_table' => 'Įrašų nėra.',
	'qa_create' => 'Sukurti',
	'qa_edit' => 'Redaguoti',
	'qa_view' => 'Peržiūrėti',
	'custom_controller_index' => 'Papildomo Controller\'io puslapis.',
	'qa_logout' => 'Atsijungti',
	'qa_add_new' => 'Pridėti naują',
	'qa_are_you_sure' => 'Ar esate tikri?',
	'qa_back_to_list' => 'Grįžti į sąrašą',
	'qa_dashboard' => 'Pagrindinis',
	'qa_delete' => 'Trinti',
	'quickadmin_title' => 'ChurchOnline Dashboard',
];