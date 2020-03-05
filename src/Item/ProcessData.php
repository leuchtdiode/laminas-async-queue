<?php
namespace AsyncQueue\Item;

class ProcessData
{
	/**
	 * @var array
	 */
	private $payLoad;

	/**
	 * @param array $payLoad
	 */
	public function __construct(array $payLoad)
	{
		$this->payLoad = $payLoad;
	}

	/**
	 * @return array
	 */
	public function getPayLoad(): array
	{
		return $this->payLoad;
	}
}