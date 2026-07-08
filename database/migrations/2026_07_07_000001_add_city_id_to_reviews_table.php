<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\City;
use App\Models\Review;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id')->nullable()->after('city');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->nullOnDelete();
        });

        if (class_exists(Review::class) && class_exists(City::class)) {
            $reviews = Review::whereNotNull('city')->get();

            foreach ($reviews as $review) {
                $city = City::firstOrCreate(
                    ['city_name' => $review->city],
                    ['city_name' => $review->city]
                );

                $review->city_id = $city->id;
                $review->save();
            }
        }
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
        });
    }
};
