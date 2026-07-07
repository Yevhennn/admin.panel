<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use CrudTrait;

    protected $fillable = ['author_name', 'city', 'rating', 'text', 'status', 'city_id'];

    protected $casts = [
        'rating' => 'integer',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', 'approved');
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    public function scopeRejected(Builder $query): Builder
    {
        return $query->where('status', 'rejected');
    }

    public function scopeByCity(Builder $query, ?int $cityId): Builder
    {
        return $query->when($cityId, fn ($q) => $q->where('city_id', $cityId));
    }
}
