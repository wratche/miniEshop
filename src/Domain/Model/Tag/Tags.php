<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Tag;

class Tags extends \Wratche\App\Domain\Model\GenericCollection
{
    public function __construct(Tag...$tags)
    {
        $this->values = $tags;
    }

    public function haveTag(Tag $checkedTag): bool
    {
        foreach ($this->values as $tag) {
            if ($tag->getId() === $checkedTag->getId()) {
                return true;
            }
        }

        return false;
    }
}
