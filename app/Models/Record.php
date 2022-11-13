<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property-read int id
 * @property int order_id
 * @property int user_id
 *
 * @property Order order
 * @property User user
 */
class Record extends Model
{
    use HasFactory;
    use Filterable;

    public const USER = User::class;

    public const Order = Order::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'records';

    protected $fillable = [
        'id',
        'order_id',
        'user_id',
    ];

    /**
     * Belongs to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(static::USER);
    }

    /**
     * Belongs to the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order(): HasOne
    {
        return $this->hasOne(static::Order);
    }
}
