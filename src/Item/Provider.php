<?php
namespace AsyncQueue\Item;

use Common\Db\FilterChain;
use Common\Db\OrderChain;

class Provider
{
	public function __construct(
		private readonly Repository $repository,
		private readonly Creator $creator
	)
	{
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