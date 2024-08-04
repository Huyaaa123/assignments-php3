<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'article_id', 'comment_content', 'commenter_id', 'comment_date'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function commenter()
    {
        return $this->belongsTo(User::class, 'commenter_id');
    }
}
