<?php

namespace App\Traits;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contracts\Commentator;
use Illuminate\Database\Eloquent\Relations\MorphMany;
trait HasComments
{
    /**
     * Return all comments for this model.
     *
     * @return MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Attach a comment to this model.
     *
     * @param string $comment
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function comment(string $comment)
    {
        return $this->commentAsUser(auth()->user(), $comment);
    }

    /**
     * Attach a comment to this model as a specific user.
     *
     * @param Model|null $user
     * @param string $comment
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function commentAsUser(?Model $user, string $comment)
    {
        $commentClass = Comment::class;

        $comment = new $commentClass([
            'comment' => $comment,
            'is_approved' => $user instanceof Commentator && ! $user->needsCommentApproval($this),
            'user_id' => is_null($user) ? null : $user->getKey(),
            'commentable_id' => $this->getKey(),
            'commentable_type' => get_class(),
        ]);

        return $this->comments()->save($comment);
    }
}
