<?php
namespace AsyncQueue\Item\Order;

use Common\Db\Order\AscOrDesc;

class ProcessAfter extends AscOrDesc
{
	/**
	 * @return string
	 */
	protected function getField()
	{
		return 't.processAfter';
	}
}