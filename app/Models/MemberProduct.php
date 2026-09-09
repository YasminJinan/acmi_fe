<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberProduct extends Model
{
    protected $connection = 'pgsql_acmi';
    protected $table = 'member_product';

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function features()
    {
        return $this->hasMany(MemberProductFeature::class, 'product_id')->orderBy('order', 'asc');
    }
}
