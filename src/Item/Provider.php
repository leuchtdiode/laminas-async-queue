<?php
namespace AsyncQueue\Item;

use Common\Db\FilterChain;
use Common\Db\OrderChain;

class Provider
{
	/**
	 * @var Repository
	 */
	private $repository;

	/**
	 * @var Creator
	 */
	private $creator;

	/**
	 * @param Repository $repository
	 * @param Creator $creator
	 */
	public function __construct(Repository $repository, Creator $creator)
	{
		$this->repository = $repository;
		$this->creator    = $creator;
	}

	/**
	 * @param FilterChain $filterChain
	 * @param OrderChain|null $orderChain
	 * @return Item[]
	 */
	public function filter(FilterChain $filterChain, ?OrderChain $orderChain = null)
	{
		return $this->createDtos(
			$this->repository->filter($filterChain, $orderChain)
		);
	}

	/**
	 * @param Entity[] $entities
	 * @return Item[]
	 */
	private function createDtos(array $entities)
	{
		return array_map(
			function (Entity $entity)
			{
				return $this->createDto($entity);
			},
			$entities
		);
	}

	/**
	 * @param Entity $entity
	 * @return Item
	 */
	private function createDto(Entity $entity)
	{
		return $this->creator->byEntity($entity);
	}
}