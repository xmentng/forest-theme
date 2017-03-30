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
	'qa_create' => 'Erstellen',
	'qa_save' => 'Speichern',
	'qa_edit' => 'Bearbeiten',
	'qa_view' => 'Betrachten',
	'qa_update' => 'Aktualisieren',
	'qa_list' => 'Listen',
	'qa_no_entries_in_table' => 'Keine Einträge in Tabelle',
	'custom_controller_index' => 'Custom controller index.',
	'qa_logout' => 'Abmelden',
	'qa_add_new' => 'Hinzufügen',
	'qa_are_you_sure' => 'Sind Sie sicher?',
	'qa_back_to_list' => 'Zurück zur Liste',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Löschen',
	'quickadmin_title' => 'ChurchOnline Dashboard',
];