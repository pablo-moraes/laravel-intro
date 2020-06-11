<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'photo'
    ];

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter) {
            if($filter) {
                // $query->where('name', '=', $filter);
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();
        // dd($results);
        return $results;
    }
}
