<?php
namespace AsyncQueue\Item;

class Creator
{
	/**
	 * @param Entity $entity
	 * @return Item
	 */
	public function byEntity(Entity $entity)
	{
		return new Item($entity);
	}
}