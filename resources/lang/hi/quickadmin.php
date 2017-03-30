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
	'qa_create' => 'बनाइए (क्रिएट)',
	'qa_save' => 'सुरक्षित करे ',
	'qa_edit' => 'संपादित करे (एडिट)',
	'qa_view' => 'देखें',
	'qa_update' => 'सुधारे ',
	'qa_list' => 'सूची',
	'qa_no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'custom_controller_index' => 'विशेष(कस्टम) कंट्रोलर इंडेक्स ।',
	'qa_logout' => 'लोग आउट',
	'qa_add_new' => 'नया समाविष्ट करे',
	'qa_are_you_sure' => 'आप निस्चित है ?',
	'qa_back_to_list' => 'सूची पे वापस जाए',
	'qa_dashboard' => 'डॅशबोर्ड ',
	'qa_delete' => 'मिटाइए',
	'quickadmin_title' => 'ChurchOnline Dashboard',
];