<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Section extends Model
{
    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sections';
    public $rules = [];
    public $editRules = [];
    public $errors;


    public function getSectionByRoute($route)
    {
        return $this->whereRaw('INSTR(?, title) > 0', [$route])
            ->where('is_active', '1')
            ->where('is_deleted', '0')
            ->first();
    }
}
