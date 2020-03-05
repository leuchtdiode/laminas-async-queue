<?php
namespace AsyncQueue\Item\Filter;

use Common\Db\Filter\Equals;

class Status extends Equals
{
	/**
	 * @return string
	 */
	protected function getParameterName()
	{
		return 'status';
	}

	/**
	 * @return string
	 */
	protected function getField()
	{
		return 't.status';
	}
}