<?php
namespace AsyncQueue\Queue;

use AsyncQueue\Item\Entity;
use AsyncQueue\Item\EntitySaver;
use DateTime;
use Throwable;

class Adder
{
	public function __construct(
		private readonly EntitySaver $entitySaver
	)
	{
	}

	/**
	 * @throws Throwable
	 */
	public function add(AddData $data): void
	{
		$entity = new Entity();
		$entity->setType($data->getType());
		$entity->setPayLoad($data->getPayLoad());
		$entity->setProcessAfter(
			$data->getProcessAfter() ?? new DateTime()
		);

		$this->entitySaver->save($entity);
	}
}