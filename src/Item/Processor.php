<?php
namespace AsyncQueue\Item;

interface Processor
{
	/**
	 * @param ProcessData $data
	 * @return ProcessResult
	 */
	public function process(ProcessData $data);
}