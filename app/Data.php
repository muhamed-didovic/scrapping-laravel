<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'device_id', 'data'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    /**
     * Scope the query to records from a particular dates.
     *
     * @param  Builder $builder
     * @param  Date $from
     * @param  Date $to
     * @return Builder
     */
    public function scopeForDate($builder, $from, $to)
    {
        if (!empty($from) && !empty($to)) {
            return $builder->whereBetween('created_at', [$from, $to]);
        }
        return $builder;
    }
}