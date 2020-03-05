<?php
namespace AsyncQueue\Action;

use Exception;
use AsyncQueue\Queue\Processor;
use Laminas\Mvc\Console\Controller\AbstractConsoleController;

class Process extends AbstractConsoleController
{
	/**
	 * @var Processor
	 */
	private $processor;

	/**
	 * @param Processor $processor
	 */
	public function __construct(Processor $processor)
	{
		$this->processor = $processor;
	}

	/**
	 * @throws Exception
	 */
	public function executeAction()
	{
		$this->processor->process();
	}
}
