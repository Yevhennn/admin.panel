<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Guide extends Model
{

    use CrudTrait;

    protected $fillable = [
        'slug',
        'category',
        'tag',
        'title_uk',
        'title_en',
        'desc_uk',
        'desc_en',
        'advantages_uk',
        'advantages_en',
        'features',
        'price_old',
        'price',
        'pages',
        'chapters',
        'templates',
        'status',
        'sort',
    ];

    protected $casts = [
        'advantages_uk' => 'array',
        'advantages_en' => 'array',
        'features' => 'array',
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->orderBy('sort')->orderByDesc('id');
    }

    public function getPriceHtmlAttribute(): string
    {
        $old = $this->price_old ? '<del>' . number_format($this->price_old) . '₴</del> ' : '';
        return $old . '<strong>' . number_format($this->price) . '₴</strong>';
    }

    public function getReviewsButton(): ?string
    {
        if (!class_exists(\Backpack\CRUD\app\Library\CrudPanel\CrudPanel::class)) {
            return null;
        }

        $count = $this->reviews()->count();
        $link = backpack_url('review?guide_id=' . $this->id);

        return '<a class="btn btn-sm btn-link" href="' . $link . '">Отзывы: ' . $count . '</a>';
    }
}
