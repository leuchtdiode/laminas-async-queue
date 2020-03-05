<?php
namespace AsyncQueue;

use AsyncQueue\Action\Process;
use Common\Router\ConsoleRouteCreator;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Ramsey\Uuid\Doctrine\UuidType;

return [

	'async-queue' => [
		'processors' => [],
	],

	'doctrine' => [
		'configuration' => [
			'orm_default' => [
				'types' => [
					UuidType::NAME => UuidType::class,
				],
			],
		],
		'driver'        => [
			'async_queue_entities' => [
				'class' => AnnotationDriver::class,
				'cache' => 'array',
				'paths' => [__DIR__ . '/../src'],
			],
			'orm_default'          => [
				'drivers' => [
					'AsyncQueue' => 'async_queue_entities',
				],
			],
		],
	],

	'console' => [
		'router' => [
			'routes' => [
				'async-queue-process' => ConsoleRouteCreator::create()
					->setRoute('async-queue process')
					->setAction(Process::class)
					->getConfig()
			],
		]
	],

	'service_manager' => [
		'abstract_factories' => [
			DefaultFactory::class,
		],
	],

	'controllers' => [
		'abstract_factories' => [
			DefaultFactory::class
		],
	],
];