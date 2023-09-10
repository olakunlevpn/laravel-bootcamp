<?php

namespace App\Traits;

trait CanComment
{
    public function needsCommentApproval($model): bool
    {
        return true;
    }
}
