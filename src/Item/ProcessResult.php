<?php
namespace AsyncQueue\Item;

class ProcessResult
{
	/**
	 * @var bool|null
	 */
	private $success;

	/**
	 * @var int|null
	 */
	private $retryInSeconds;

	/**
	 * @return bool|null
	 */
	public function isSuccess(): ?bool
	{
		return $this->success;
	}

	/**
	 * @param bool|null $success
	 */
	public function setSuccess(?bool $success): void
	{
		$this->success = $success;
	}

	/**
	 * @return int|null
	 */
	public function getRetryInSeconds(): ?int
	{
		return $this->retryInSeconds;
	}

	/**
	 * @param int|null $retryInSeconds
	 */
	public function setRetryInSeconds(?int $retryInSeconds): void
	{
		$this->retryInSeconds = $retryInSeconds;
	}
}