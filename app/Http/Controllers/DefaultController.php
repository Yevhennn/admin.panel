<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
        $reviews = Review::approved()
            ->orderByDesc('created_at')
            ->paginate(10);

        $stats = [
            'average' => Review::approved()->avg('rating') ? round(Review::approved()->avg('rating'), 1) : 0,
            'count' => Review::approved()->count(),
            'distribution' => [
                5 => Review::approved()->where('rating', 5)->count(),
                4 => Review::approved()->where('rating', 4)->count(),
                3 => Review::approved()->where('rating', 3)->count(),
                2 => Review::approved()->where('rating', 2)->count(),
                1 => Review::approved()->where('rating', 1)->count(),
            ],
        ];

        return view('reviews.index', compact('reviews', 'stats'));
    }
}
