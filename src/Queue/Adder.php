<?php
namespace AsyncQueue\Queue;

use AsyncQueue\Item\Entity;
use AsyncQueue\Item\EntitySaver;
use DateTime;
use Exception;

class Adder
{
	private EntitySaver $entitySaver;

	public function __construct(EntitySaver $entitySaver)
	{
		$this->entitySaver = $entitySaver;
	}

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