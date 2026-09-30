<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Page extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';
    public $rules = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'section_id',
        'page_identifier',
        'category',
        'icon',
        'url',
        'image',
        'image_responsive',
        'events_image',
        'number',
        'period',
        'year',
        'title',
        'subtitle',
        'content',
        'content_sec',
        'link',
        'upload_video',
        'pdf',
        'html_source',
        'is_active',
        'sort_order',
        'created_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope for active records.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for records ordered by their display order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /**
     * The DB stores this legacy column under a misspelled name (html_soruce);
     * expose it as html_source so the rest of the application stays clean.
     */
    public function getHtmlSourceAttribute($value)
    {
        return $this->attributes['html_soruce'] ?? null;
    }

    public function setHtmlSourceAttribute($value)
    {
        $this->attributes['html_soruce'] = $value;
    }

    public $editRules = [];
    public $errors;
    public function isPageValid($data, $number)
    {
        $this->setRules($number);

        $validation = Validator::make($data, $this->rules);
        if ($validation->passes())
            return true;
        $this->errors = $validation->errors();
        return false;
    }
    public function isEditPageValid($data, $number)
    {
        $this->setRules($number);

        $validation = Validator::make($data, $this->rules);
        if ($validation->passes())
            return true;
        $this->errors = $validation->errors();
        return false;
    }

    private function setRules($number)
    {
        if ($number == 1) { //programme
            $this->rules = [
                'icon' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=60,max_height=60',
                'image' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:min_width=1500,max_height=650',
                'image_responsive' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=500,max_height=200',
            ];
        } else if ($number == 2) { //participer -> Caritas
            $this->rules = [
                'icon' => 'nullable|mimes:png,jpeg,jpg|max:2048|dimensions:max_width=400,max_height=380',
                'image' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=650,max_height=900',
                'image_responsive' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=300,max_height=400',
            ];
        } else if ($number == 3) { //director
            $this->rules = [
                'image' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=230,max_height=250',
            ];
        } else if ($number == 4) { //news
            $this->rules = [
                'image' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=600,max_height=600',
            ];
        } else if ($number == 5) { //initiatives/referendumns
            $this->rules = [
                'icon' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=550,max_height=250',
                'image' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=1200,max_height=570',
                'image_responsive' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=500,max_height=480', /////SLIDER IMAGE//////
            ];
        } else if ($number == 6 ) { //EVENTS
            $this->rules = [
                'icon' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=700,max_height=350',
                'image' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=800,max_height=1150',
                'image_responsive' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=400,max_height=600',
                'events_image' => 'nullable|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=5000,max_height=5000',/////Missing//////
            ];
        }
    }


    public function getAllBySection($sectionId)
    {
        return $this->active()->where('section_id', $sectionId)->get();
    }
    public function getAllBySectionObject($section)
    {
        return $this->active()->where('section_id', $section->id)->get();
    }
    public function getById($id)
    {
        return $this->active()->where('id', $id)->first();
    }
    public function getAllBySectionAndCategory($section, $category)
    {
        return $this->active()
            ->where('section_id', $section->id)
            ->where('category', $category)
            ->get();
    }
    public function getByCategoryAndUrl($category, $url)
    {
        return $this->active()
            ->where('url', $url)
            ->where('category', $category)
            ->first();
    }
    public function getAllByCategory($category)
    {
        return $this->active()->where('category', $category)->get();
    }
    public function getPaginatedBySection($section)
    {
        return $this->active()
            ->where('section_id', $section->id)
            ->paginate(5);
    }
    public function getPaginatedByUrl($url, $section_id)
    {
        return $this->active()
            ->where('url', $url)
            ->where('section_id', $section_id)
            ->paginate(5);
    }
    public function getByTitleAndUrl($url, $title)
    {
        return $this->active()
            ->where('url', $url)
            ->where('title', $title)
            ->first();
    }
    public function getByUrl($url, $section_id)
    {
        return $this->active()->where('url', $url)->where('section_id', $section_id)->first();
    }
    public function getFirstBySection($section)
    {
        return $this->active()->where('section_id', $section->id)->first();
    }
    public function getAllByUrl($url, $section_id)
    {
        return $this->active()->where('url', $url)->where('section_id', $section_id)->get();
    }
    
    /**
     * Relationship: A page belongs to a section.
     */
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_identifier');
    }
}
