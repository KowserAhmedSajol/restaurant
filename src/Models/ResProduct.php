<?php

namespace restaurant\restaurant\Models;

use App\Traits\Historiable;
use App\Traits\UserTrackable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResProduct extends Model
{
    use Historiable;
    use SoftDeletes;
    use UserTrackable;

    protected $table = 'res_products';
    protected $guarded = ['id'];

    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

        
    public function category(): BelongsTo
    {
        return $this->belongsTo(ResCategory::class, 'res_category_id');
    }

    public function resOrder(): BelongsTo
    {
        return $this->belongsTo(ResOrder::class, 'ResOrder_id');
    }
    public function resOrderItem(): BelongsTo
    {
        return $this->belongsTo(ResOrderItem::class, 'ResOrderItem_id');
    }

    public function comboProducts(): HasMany
    {
        return $this->hasMany(ResComboProduct::class, 'combo_product_id');
    }

    public function createdBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }
}