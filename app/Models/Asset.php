<?php

namespace App\Models;

use App\AssetStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Asset extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //protected $table = 'asset';
    protected $fillable = [
        'category_id',
        'location_id',
        'manufacturer_id',
        'assigned_to_user_id',
        'asset_tag',
        'name',
        'serial_number',
        'model_name',
        'purchase_date',
        'purchase_price',
        'status',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     * Defines how certain attributes should be cast when retrieved from the database.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'purchase_date' => 'date',
        'purchase_price' => 'decimal:2',
        'status' => AssetStatusEnum::class, // Assuming you might create an Enum for Asset Status later
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    


}