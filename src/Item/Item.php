<?php
namespace AsyncQueue\Item;

class Item
{
	/**
	 * @var Entity
	 */
	private $entity;

	/**
	 * @param Entity $entity
	 */
	public function __construct(Entity $entity)
	{
		$this->entity = $entity;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->entity->getType();
	}

	/**
	 * @return array
	 */
	public function getPayLoad()
	{
		return $this->entity->getPayLoad() ?? [];
	}

	/**
	 * @return Entity
	 */
	public function getEntity(): Entity
	{
		return $this->entity;
	}
}