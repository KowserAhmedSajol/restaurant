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

class ResOrder extends Model
{
    use Historiable;
    use SoftDeletes;
    use UserTrackable;

    protected $table = 'res_orders';
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

    
public function resCategorys(): HasMany
{
    return $this->hasMany(ResCategory::class, 'ResCategory_id');
}

public function resProducts(): HasMany
{
    return $this->hasMany(ResProduct::class, 'ResProduct_id');
}

public function resOrderItems(): HasMany
{
    return $this->hasMany(ResOrderItem::class, 'Res_order_id');
}
public function resBilling(): BelongsTo
{
    return $this->belongsTo(ResBilling::class, 'ResBilling_id');
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