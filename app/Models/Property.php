<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Number;

class Property extends Model
{
    //
    use HasFactory;

    public function getPriceAsCurrency(){
        return Number::currency($this->price);
    }

    public function getPriceBySquareFeet(){
        return Number::currency($this->price / $this->sq_ft, 2);

    }
}
