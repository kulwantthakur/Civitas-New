<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AudioFile extends Model
{
    use SoftDeletes;

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

    public $rules = [];

    public $editRules = [];
    public $errors;

    public function podcast()
    {
        return $this->belongsTo(Podcast::class, 'podcast_id');
    }
}
