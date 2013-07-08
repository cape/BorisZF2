<?php
namespace BorisZF2;
return[
	'Boris' => [
			'disable_usage' => false,    // set to true to disable showing available ZFTool commands in Console.
	],
	'controllers' => [
// 		'factories'=>[
// 			'BorisZf2/Default' => function(){
// 				$controller = new DefaultController();
// 				return $controller;
// 			}
// 		]
		'invokables' => [
			'BorisZf2/Default' => 'BorisZF2\Controller\DefaultController'
		]
	],
	'console' => [
		'router' => [
			'routes' => [
				'boris-version' => [
					'options' => [
						'route'    => 'version',
						'defaults' => [
								'controller' => 'BorisZf2/Default',
								'action'     => 'version'
						]
					]
				],
				'boris-console' => [
					'options' => [
						'route'    => 'console',
							'defaults' => [
							'controller' => 'BorisZf2/Default',
							'action'     => 'console'
						]
					]
				],
			]
		]
	]

];