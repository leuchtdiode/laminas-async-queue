<?php
namespace AsyncQueue;

use Common\AbstractDefaultFactory;

class DefaultFactory extends AbstractDefaultFactory
{
	/**
	 * @return string
	 */
	protected function getNamespace()
	{
		return __NAMESPACE__;
	}
}