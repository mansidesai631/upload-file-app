<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    use SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename', 'code', 'download_count', 'user_id',
    ];

    public function getRouteKeyName()
    {
        return 'code';
    }


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
