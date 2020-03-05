<?php
namespace AsyncQueue\Queue;

use AsyncQueue\Item\Entity;
use AsyncQueue\Item\EntitySaver;
use DateTime;
use Exception;

class Adder
{
	/**
	 * @var EntitySaver
	 */
	private $entitySaver;

	/**
	 * @param EntitySaver $entitySaver
	 */
	public function __construct(EntitySaver $entitySaver)
	{
		$this->entitySaver = $entitySaver;
	}

	/**
	 * @param AddData $data
	 * @throws Exception
	 */
	public function add(AddData $data)
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