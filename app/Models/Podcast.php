<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Validator;


class Podcast extends Model
{
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
            ->where('is_deleted', 0)
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
