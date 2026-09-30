<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class FormSubmission extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'form_submissions';

    protected $fillable = [
        'user_id',
        'source_page',
        'gender',
        'email',
        'firstname',
        'lastname',
        'address',
        'post_code',
        'canton_province',
        'country',
        'articles',
        'reference',
        'titre_detail',
        'quantity',
        'price',
        'comment',
        'analyses_opinions',
        'events_civitas',
        'news',
        'bulletin',
        'romkurier',
        'events_amissfs',
        'agree_terms',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'analyses_opinions' => 'boolean',
        'events_civitas' => 'boolean',
        'news' => 'boolean',
        'bulletin' => 'boolean',
        'romkurier' => 'boolean',
        'events_amissfs' => 'boolean',
        'agree_terms' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Scope for active records.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public $rules = [
        'gender' => 'required|in:mr,mrs',
        'email' => 'required|email|max:255',
        'firstname' => 'required|max:255',
        'lastname' => 'required|max:255',
    ];

    public $editRules = [];
    public $errors;

    public function isFormValid($data)
    {
        $validation = Validator::make($data, $this->rules);
        if ($validation->passes())
            return true;
        $this->errors = $validation->errors();
        return false;
    }
}
