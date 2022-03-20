<?php
namespace AsyncQueue\Item\Filter;

use Common\Db\Filter\Equals;

class Status extends Equals
{
	protected function getParameterName(): string
	{
		return 'status';
	}

	protected function getField(): string
	{
		return 't.status';
	}
}