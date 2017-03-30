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
	'qa_create' => 'Crear',
	'qa_save' => 'Guardar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Ver',
	'qa_update' => 'Actualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sin valores en la tabla',
	'custom_controller_index' => 'Índice del controlador personalizado (index).',
	'qa_logout' => 'Salir',
	'qa_add_new' => 'Agregar',
	'qa_are_you_sure' => 'Estás seguro?',
	'qa_back_to_list' => 'Regresar a la lista?',
	'qa_dashboard' => 'Tablero',
	'qa_delete' => 'Eliminar',
	'quickadmin_title' => 'ChurchOnline Dashboard',
];