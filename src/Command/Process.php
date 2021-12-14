<?php
namespace AsyncQueue\Command;

use AsyncQueue\Queue\Processor;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Process extends Command
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

		parent::__construct();
	}

	protected function configure()
	{
		$this
			->setName('async-queue:process')
			->setDescription('Processes the pending async queue items');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$this->processor->process();

		return self::SUCCESS;
	}
}