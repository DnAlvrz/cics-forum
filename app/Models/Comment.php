<?php

namespace App\Models;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable =[
        'body',
        'user_id'
    ];
    public function user() {
       return $this->belongsTo(User::class);
    }
    public function votes() {
        return $this->hasMany(Vote::class);
    }
    public function ownedBy(User $user) {
        return $this->user_id === $user->id;
    }
    
    public function votedBy(User $user) {
        return $this->votes->contains('user_id', $user->id);
    }
}
