<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'			=> dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'				=> 'ShortUrl',
	'sourceLanguage'	=> 'en', 
	'language'			=> 'en',  
	'timezone'			=> 'UTC', //, 'America/New_York',
	
	//'onBeginRequest'	=> create_function('$event', 'return ob_start("ob_gzhandler");'),
	//'onEndRequest'		=> create_function('$event', 'return ob_end_flush();'),
	
	// preloading 'log' component
	'preload'=>array('log'),
	
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.admin.components.*',
	),

	'defaultController'=>'site',
	
	'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'qwerty',
			//'ipFilters'=>array('127.0.0.1','::1'),
			'ipFilters'=>array('*'),
        ),
		//'admin' => array('postPerPage' => 30),
    ),

	// application components
	'components'=>array(
		/*'coreMessages'=>array(
			'basePath'=>'protected'.DIRECTORY_SEPARATOR.'messages',
		),*/
		'cache'=>array(
            'class'=>'system.caching.CDbCache',
		),
		
		'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
		
		'urlManager'=>array(
			'showScriptName' => false,
			'urlFormat'=>'path', 
			'rules'=>array(
			
				'gii'=>'gii',
				'gii/<controller:\w+>'=>'gii/<controller>',
				'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
				'/site/getshorturl/'=>'/site/getshorturl',
				'/<hash_code:.+>'=>'/site/redirect/hash_code/<hash_code>',
			)
			
		),	
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
			// force 403 HTTP error if authentication needed
			'loginUrl' => array('/login'), //null
		),
		// uncomment the following to set up database
		
		'db'=> require(dirname(__FILE__).'/db.php'),
		'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
			'defaultRoles' => array('guest'),
        ),
		
		
		/*'messages' => array(
			'class' => 'CPhpMessageSource'//'CDbMessageSource',
		),*/
		
		/*'obfuscator' => array(
			'class' =>'application.extensions.obfuscator.Obfuscator',
		)*/
		
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	// this is used in contact page
	'params' => require(dirname(__FILE__).'/params.php'),
	
);