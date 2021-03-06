<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'EKAB VFM SYSTEM',
        //date_default_timezone_set('Europe/Athens');
	'timeZone'=> 'Europe/Athens',
	// preloading 'log' component
	'preload'=>array('log'),
    
        'sourceLanguage'=>'en',
       'language'=>'el',

	// autoloading model and component classes
        // update import with user and rights extensions 
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.user.models.*',
                'application.modules.user.components.*',
                'application.modules.rights.*',
                'application.modules.rights.components.*',
                'zii.widgets.jui.*',


	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		// uncommented by IP on 20140904
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'root',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
                //add user extension reference
		'user'=>array(
                'tableUsers' => 'users',
                'tableProfiles' => 'profiles',
                'tableProfileFields' => 'profiles_fields',
                'profileRelations'=>array(
                        'sector'=>array(CActiveRecord::BELONGS_TO, 'SectorEkab', 'sector_id')),

                ),
                //add rights extension reference
                'rights'=>array(
                    'install'=>false,
                   
                ),
        ),

	// application components
	'components'=>array(
                //add user extension reference
		'user'=>array(
                        // 'class' => 'WebUser',
			'class'=>'RWebUser',
                        // enable cookie-based authentication
                        'allowAutoLogin'=>true,
                        'loginUrl'=>array('/user/login'),
                ),
            
                'authManager'=>array(
                'class'=>'RDbAuthManager',
                'connectionID'=>'db',
                'defaultRoles'=>array('Authenticated', 'Guest'),
               
                ),
                
                'widgetFactory' => array(
                'widgets' => array(
                 'CJuiDatePicker'=>array(
                                    'options'=>array('dateFormat'=>'dd-mm-yy', 
                                                'changeMonth'=>'true', 
                                                'changeYear'=>'true',),
                                     'htmlOptions'=>array('style'=>'height:20px;'))
                    ),
                ),
               // uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/* commented by IP on 20140904
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		  end of commented by IP on 20140904*/ 
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=vfm',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'mgav221114',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);