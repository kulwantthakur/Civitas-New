<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;


class Podcast extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'podcasts';
    public $rules = [];
    protected $guarded = [];
    public $editRules = [];
    public $errors;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope for active records.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function isPodcastValid($data)
    {
        $validation = Validator::make($data, $this->rules);
        if ($validation->passes())
            return true;

        $this->errors = $validation->errors();
        return false;
    }

    public function isEditPodcastValid($data)
    {
        $validation = Validator::make($data, $this->rules);
        if ($validation->passes())
            return true;

        $this->errors = $validation->errors();
        return false;
    }

    public function getPodcastByCategory($categoryId)
    {
        return $this->with('category')
            ->where('category_id', $categoryId)
            ->where('is_active', 1)
            ->get();
    }

    public function category()
    {
        return $this->belongsTo(PodcastCategory::class, 'category_id');
    }

    public function audioFiles()
    {
        return $this->hasMany(AudioFile::class, 'podcast_id');
    }

    public function keywords()
    {
        return $this->belongsToMany(PodcastKeyword::class, 'podcast_keyword_podcast', 'podcast_id', 'keyword_id', 'podcast_identifier', 'id')
            ->withTimestamps();
    }
}
