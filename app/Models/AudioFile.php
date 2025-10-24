<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioFile extends Model
{

    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'audio_files';

    protected $fillable = [
        'podcast_id',  // Make sure to allow mass assignment for podcast_id
        'file_path',   // And for other columns like 'file_path'
    ];
    public $rules = [];

    public $editRules = [];
    public $errors;

    public function podcast()
    {
        return $this->belongsTo(Podcast::class, 'podcast_id');
    }
}
