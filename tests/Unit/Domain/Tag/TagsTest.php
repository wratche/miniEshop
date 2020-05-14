<?php

declare(strict_types=1);

namespace Wratche\Tests\Tag;

use PHPUnit\Framework\TestCase;
use Wratche\Domain\Tag\Tags;

class TagsTest extends TestCase
{
    public function testEmptyTag(): void
    {
        $tagsEmpty = new Tags(...[]);
        self::assertEmpty($tagsEmpty->toArray());
    }
}
