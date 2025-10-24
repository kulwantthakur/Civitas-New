<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Validator;

class PodcastHistory extends Model
{

    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'podcast_history';
    protected $fillable = [
        'user_id',
        'podcast_id',
        'is_active',
        'is_deleted',
        
    ];
    public $rules = [];

    public $editRules = [];
    public $errors;


    public function podcast()
    {
        return $this->belongsTo(Podcast::class, 'podcast_id', 'podcast_identifier');
    }
}
