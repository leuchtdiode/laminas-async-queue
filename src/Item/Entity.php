<?php
namespace AsyncQueue\Item;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Table(name="asyncqueue_items")
 * @ORM\Entity(repositoryClass="AsyncQueue\Item\Repository")
 */
class Entity
{
	/**
	 * @var UuidInterface
	 *
	 * @ORM\Id
	 * @ORM\Column(type="uuid");
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=25)
	 */
	private $status;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=150)
	 */
	private $type;

	/**
	 * @var array|null
	 *
	 * @ORM\Column(type="json")
	 */
	private $payLoad;

	/**
	 * @var DateTime
	 *
	 * @ORM\Column(type="datetime")
	 */
	private $createdDate;

	/**
	 * @var DateTime
	 *
	 * @ORM\Column(type="datetime")
	 */
	private $processAfter;

	/**
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->id          = Uuid::uuid4();
		$this->status      = Status::PENDING;
		$this->createdDate = new DateTime();
	}

	/**
	 * @return UuidInterface
	 */
	public function getId(): UuidInterface
	{
		return $this->id;
	}

	/**
	 * @param UuidInterface $id
	 */
	public function setId(UuidInterface $id): void
	{
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * @param string $status
	 */
	public function setStatus(string $status): void
	{
		$this->status = $status;
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
	 */
	public function setType(string $type): void
	{
		$this->type = $type;
	}

	/**
	 * @return array|null
	 */
	public function getPayLoad(): ?array
	{
		return $this->payLoad;
	}

	/**
	 * @param array|null $payLoad
	 */
	public function setPayLoad(?array $payLoad): void
	{
		$this->payLoad = $payLoad;
	}

	/**
	 * @return DateTime
	 */
	public function getCreatedDate(): DateTime
	{
		return $this->createdDate;
	}

	/**
	 * @param DateTime $createdDate
	 */
	public function setCreatedDate(DateTime $createdDate): void
	{
		$this->createdDate = $createdDate;
	}

	/**
	 * @return DateTime
	 */
	public function getProcessAfter(): DateTime
	{
		return $this->processAfter;
	}

	/**
	 * @param DateTime $processAfter
	 */
	public function setProcessAfter(DateTime $processAfter): void
	{
		$this->processAfter = $processAfter;
	}
}