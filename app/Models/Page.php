<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Page extends Model
{
    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';
    public $rules = [];

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
        return $this->where('section_id', $sectionId)->where('is_active', '1')
            ->where('is_deleted', '0')->get();
    }
    public function getAllBySectionObject($section)
    {
        return $this->where('section_id', $section->id)->where('is_active', '1')
            ->where('is_deleted', '0')->get();
    }
    public function getById($id)
    {
        return $this->where('id', $id)->where('is_active', '1')
            ->where('is_deleted', '0')->first();
    }
    public function getAllBySectionAndCategory($section, $category)
    {
        return $this->where('section_id', $section->id)
            ->where('category', $category)
            ->where('is_active', '1')
            ->where('is_deleted', '0')
            ->get();
    }
    public function getByCategoryAndUrl($category, $url)
    {
        return $this->where('url', $url)
            ->where('category', $category)
            ->where('is_active', '1')
            ->where('is_deleted', '0')
            ->first();
    }
    public function getAllByCategory($category)
    {
        return $this->where('category', $category)->where('is_active', '1')
            ->where('is_deleted', '0')->get();
    }
    public function getPaginatedBySection($section)
    {
        return $this->where('section_id', $section->id)
            ->where('is_active', '1')
            ->where('is_deleted', '0')
            ->paginate(5);
    }
    public function getPaginatedByUrl($url, $section_id)
    {
        return $this->where('url', $url)
            ->where('section_id', $section_id)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->paginate(5);
    }
    public function getByTitleAndUrl($url, $title)
    {
        return $this->where('url', $url)
            ->where('title', $title)
            ->where('is_active', '1')
            ->where('is_deleted', '0')
            ->first();
    }
    public function getByUrl($url, $section_id)
    {
        return $this->where('url', $url)->where('section_id', $section_id)->where('is_active', '1')
            ->where('is_deleted', '0')->first();
    }
    public function getFirstBySection($section)
    {
        return $this->where('section_id', $section->id)->where('is_active', '1')
            ->where('is_deleted', '0')->first();
    }
    public function getAllByUrl($url, $section_id)
    {
        return $this->where('url', $url)->where('section_id', $section_id)->where('is_active', '1')
            ->where('is_deleted', '0')->get();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_identifier');
    }
}
