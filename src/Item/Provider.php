<?php
namespace AsyncQueue\Item;

use Common\Db\FilterChain;
use Common\Db\OrderChain;

class Provider
{
	private Repository $repository;

	private Creator $creator;

	public function __construct(Repository $repository, Creator $creator)
	{
		$this->repository = $repository;
		$this->creator    = $creator;
	}

	/**
	 * @return Item[]
	 */
	public function filter(FilterChain $filterChain, ?OrderChain $orderChain = null): array
	{
		return $this->createDtos(
			$this->repository->filter($filterChain, $orderChain)
		);
	}

	/**
	 * @param Entity[] $entities
	 * @return Item[]
	 */
	private function createDtos(array $entities): array
	{
		return array_map(
			function (Entity $entity)
			{
				return $this->createDto($entity);
			},
			$entities
		);
	}

	private function createDto(Entity $entity): Item
	{
		return $this->creator->byEntity($entity);
	}
}