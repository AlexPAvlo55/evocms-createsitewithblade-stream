<?php

namespace EvolutionCMS\Stream\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use SoftDeletes;

    protected $table = 'comments';
    protected $dateFormat = 'U';

    protected $attributes = [
        'published' => false,
    ];

    protected $fillable = ['name', 'message', 'content_id'];

    protected $guarded = ['published'];

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function scopeResource($query)
    {
        return $query->where('content_id', EvolutionCMS()->documentIdentifier);
    }
}