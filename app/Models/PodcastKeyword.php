<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Validator;

class PodcastKeyword extends Model
{

    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'podcast_keywords';
    public $rules = [];

    public $editRules = [];
    public $errors;

    public function isPodcastKeywordValid($data)
    {
        $validation = Validator::make($data, $this->rules);
        if ($validation->passes())
            return true;

        $this->errors = $validation->errors();
        return false;
    }

    public function isEditPodcastKeywordValid($data)
    {
        $validation = Validator::make($data, $this->rules);
        if ($validation->passes())
            return true;

        $this->errors = $validation->errors();
        return false;
    }

    public function getAllKeywords()
    {
        return $this->where('is_active', '1')
            ->where('is_deleted', '0')->get();
    }

    public function podcasts()
    {
        return $this->belongsToMany(Podcast::class, 'podcast_keyword_podcast', 'keyword_id', 'podcast_id', 'id', 'podcast_identifier');
    }


    public function pdocastCategories()
    {
        return $this->belongsToMany(PodcastCategory::class, 'podcast_keyword_category', 'keyword_id', 'category_id')->withTimestamps();;
    }
}
