<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class PodcastCategory extends Model
{
    use SoftDeletes;

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

    /**
     * Relationship: A category has many podcasts.
     */
    public function podcasts()
    {
        return $this->hasMany(Podcast::class, 'category_id');
    }

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
        return $this->active()->get();
    }

    public function keywords()
    {
        return $this->belongsToMany(PodcastKeyword::class, 'podcast_keyword_category', 'category_id', 'keyword_id')->withTimestamps();
    }
}
