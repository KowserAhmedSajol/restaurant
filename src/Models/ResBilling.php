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

class ResBilling extends Model
{
    use Historiable;
    use SoftDeletes;
    use UserTrackable;

    protected $table = 'res_billings';
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

    
public function resOrder(): HasOne
{
    return $this->hasOne(ResOrder::class, 'ResOrder_id');
}

public function resTable(): HasOne
{
    return $this->hasOne(ResTable::class, 'ResTable_id');
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