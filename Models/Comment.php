<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   Modules\Comments\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

namespace Modules\Comments\Models;

use Modules\Admin\Models\Account;
use Modules\Admin\Models\NullAccount;
use Modules\Media\Models\Media;

/**
 * Comment class.
 *
 * @package Modules\Comments\Models
 * @license OMS License 1.0
 * @link    https://orange-management.org
 * @since   1.0.0
 */
class Comment
{
    /**
     * ID.
     *
     * @var int
     * @since 1.0.0
     */
    protected int $id = 0;

    /**
     * Account.
     *
     * @var Account
     * @since 1.0.0
     */
    public Account $createdBy;

    /**
     * Created at
     *
     * @var \DateTimeImmutable
     * @since 1.0.0
     */
    public \DateTimeImmutable $createdAt;

    /**
     * Comment list this comment belongs to
     *
     * @var int|CommentList
     * @since 1.0.0
     */
    private $list = 0;

    /**
     * Title
     *
     * @var string
     * @since 1.0.0
     */
    public string $title = '';

    /**
     * Comment status
     *
     * @var int
     * @since 1.0.0
     */
    private int $status = CommentStatus::VISIBLE;

    /**
     * Content
     *
     * @var string
     * @since 1.0.0
     */
    public string $content = '';

    /**
     * Content raw
     *
     * @var string
     * @since 1.0.0
     */
    public string $contentRaw = '';

    /**
     * Comment this is refering to
     *
     * @var null|int|self
     * @since 1.0.0
     */
    private $ref = null;

    /**
     * Media files
     *
     * @var Media[]
     * @since 1.0.0
     */
    protected array $media = [];

    /**
     * Constructor.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->createdBy = new NullAccount();
        $this->createdAt = new \DateTimeImmutable();
    }

    /**
     * Get id.
     *
     * @return int Model id
     *
     * @since 1.0.0
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Reference id
     *
     * @param mixed $ref Reference
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function setRef($ref) : void
    {
        $this->ref = $ref;
    }

    /**
     * Get the reference
     *
     * @return mixed
     *
     * @since 1.0.0
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set the status
     *
     * @param int $status Status
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function setStatus(int $status) : void
    {
        $this->status = $status;
    }

    /**
     * Get the status
     *
     * @return int
     *
     * @since 1.0.0
     */
    public function getStatus() : int
    {
        return $this->status;
    }

    /**
     * Set the list this comment belongs to
     *
     * @param int|CommentList $list List
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function setList($list) : void
    {
        $this->list = $list;
    }

    /**
     * Get the list this comment belongs to
     *
     * @return int|CommentList
     *
     * @since 1.0.0
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize() : array
    {
        return [];
    }

    /**
     * Get all media
     *
     * @return Media[]
     *
     * @since 1.0.0
     */
    public function getMedia() : array
    {
        return $this->media;
    }

    /**
     * Add media
     *
     * @param Media $media Media to add
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function addMedia(Media $media) : void
    {
        $this->media[] = $media;
    }
}
