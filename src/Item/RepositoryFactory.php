<?php
namespace AsyncQueue\Item;

use Common\Db\EntityRepository;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class RepositoryFactory implements FactoryInterface
{
	/**
	 * @param ContainerInterface $container
	 * @param string $requestedName
	 * @param array|null $options
	 * @return EntityRepository
	 */
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		return $container
			->get(EntityManager::class)
			->getRepository(Entity::class);
	}
}
