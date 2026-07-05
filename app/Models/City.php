<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use CrudTrait;


   protected $table = "cities";

    protected $fillable = ['city_name'];

   protected $primaryKey = "id";

   protected $guarded = ['id'];


}
