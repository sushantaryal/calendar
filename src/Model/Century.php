<?php

namespace Taggers\Century\Model;

use Illuminate\Database\Eloquent\Model;

class Century extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'century_calendar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'all_day',
        'start',
        'end',
        'options'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'all_day' => 'boolean',
        'options' => 'object'
    ];
}
