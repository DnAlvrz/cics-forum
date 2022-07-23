<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'comment_id',
        'category'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function ownedBy(User $user) {
        return $this->user_id === $user->id;
    }
    public function hasBestReply() {
        return Comment::find($this->comment_id);
    }
    public function bestReply() {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    public function mark(Comment $comment) {
        $this->update([
            'comment_id' => $comment->id
        ]);
    }
}
