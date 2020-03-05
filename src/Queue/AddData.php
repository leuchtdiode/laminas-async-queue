<?php
namespace AsyncQueue\Queue;

use DateTime;

class AddData
{
	/**
	 * @var string
	 */
	private $type;

	/**
	 * @var array
	 */
	private $payLoad;

	/**
	 * @var DateTime|null
	 */
	private $processAfter;

	/**
	 * @return AddData
	 */
	public static function create()
	{
		return new self();
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return AddData
	 */
	public function setType(string $type): AddData
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getPayLoad(): array
	{
		return $this->payLoad;
	}

	/**
	 * @param array $payLoad
	 * @return AddData
	 */
	public function setPayLoad(array $payLoad): AddData
	{
		$this->payLoad = $payLoad;
		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getProcessAfter(): ?DateTime
	{
		return $this->processAfter;
	}

	/**
	 * @param DateTime|null $processAfter
	 * @return AddData
	 */
	public function setProcessAfter(?DateTime $processAfter): AddData
	{
		$this->processAfter = $processAfter;
		return $this;
	}
}