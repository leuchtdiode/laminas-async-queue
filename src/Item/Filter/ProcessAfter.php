<?php
namespace AsyncQueue\Item\Filter;

use Common\Db\Filter\Date;

class ProcessAfter extends Date
{
	/**
	 * @return string
	 */
	protected function getColumn()
	{
		return 't.processAfter';
	}
}