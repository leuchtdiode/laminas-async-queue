<?php
namespace AsyncQueue;

use AsyncQueue\Command\Process as Process;
use Doctrine\ORM\Mapping\Driver\AttributeDriver;
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
				'class' => AttributeDriver::class,
				'cache' => 'array',
				'paths' => [ __DIR__ . '/../src' ],
			],
			'orm_default'          => [
				'drivers' => [
					'AsyncQueue' => 'async_queue_entities',
				],
			],
		],
	],

	'console' => [
		'commands' => [
			Process::class,
		],
	],

	'service_manager' => [
		'abstract_factories' => [
			DefaultFactory::class,
		],
	],

	'controllers' => [
		'abstract_factories' => [
			DefaultFactory::class,
		],
	],
];