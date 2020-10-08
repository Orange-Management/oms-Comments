<?php
/**
 * Orange Management
 *
 * PHP Version 7.4
 *
 * @package   tests
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

namespace Modules\Comments\tests\Models;

use Modules\Admin\Models\NullAccount;
use Modules\Comments\Models\Comment;
use Modules\Comments\Models\NullComment;

/**
 * @internal
 */
class CommentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers Modules\Comments\Models\Comment
     * @group module
     */
    public function testDefault() : void
    {
        $comment = new Comment();
        self::assertEquals(0, $comment->getId());

        $date = new \DateTime('now');
        self::assertEquals($date->format('Y-m-d'), $comment->getCreatedAt()->format('Y-m-d'));
        self::assertEquals(0, $comment->getCreatedBy()->getId());
        self::assertEquals(0, $comment->getList());
        self::assertEquals(0, $comment->getRef());
        self::assertEquals('', $comment->getTitle());
        self::assertEquals('', $comment->getContent());
    }

    /**
     * @covers Modules\Comments\Models\Comment
     * @group module
     */
    public function testGetSet() : void
    {
        $comment = new Comment();

        $comment->setCreatedBy(new NullAccount(1));
        self::assertEquals(1, $comment->getCreatedBy()->getId());

        $comment->setList(2);
        self::assertEquals(2, $comment->getList());

        $comment->setRef(new NullComment(3));
        self::assertEquals(3, $comment->getRef()->getId());

        $comment->setTitle('Test Title');
        self::assertEquals('Test Title', $comment->getTitle());

        $comment->setContent('Test Content');
        self::assertEquals('Test Content', $comment->getContent());
    }
}
