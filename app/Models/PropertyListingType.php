<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Property;

class PropertyListingType extends Model
{
    //
    protected $table ="property_listing_type";

    public function properties(): HasMany{ //relacion uno a muchos con la tabla properties
        return $this->hasMany(Property::class, 'property_listing_type_id');
    }

}
