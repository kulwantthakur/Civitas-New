<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Validator;

class PodcastCategory extends Model
{

    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'podcast_categories';
    public $rules = [
        'icon' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=150,max_height=150',
        'image' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=650,max_height=650',
    ];
    protected $guarded = [];
    public $editRules = [];
    public $errors;

    public function isPodcastCategoryValid($data)
    {
        $validation = Validator::make($data, $this->rules);
        if ($validation->passes())
            return true;

        $this->errors = $validation->errors();
        return false;
    }

    public function isEditPodcastCategoryValid($data)
    {
        $validation = Validator::make($data, $this->rules);
        if ($validation->passes())
            return true;

        $this->errors = $validation->errors();
        return false;
    }

    public function getAllCategories()
    {
        return $this->where('is_active', '1')
            ->where('is_deleted', '0')->get();
    }

    public function podcasts()
    {
        return $this->hasMany(Podcast::class, 'category_id');
    }

    public function keywords()
    {
        return $this->belongsToMany(PodcastKeyword::class, 'podcast_keyword_category', 'category_id', 'keyword_id')->withTimestamps();;
    }
}
