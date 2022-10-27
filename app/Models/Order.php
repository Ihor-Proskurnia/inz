<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property-read int id
 * @property int category_id
 * @property int user_id
 * @property string date
 * @property string from_time
 * @property string to_time
 * @property string name
 * @property string description
 *
 * @property Category category
 * @property User trainer
 */
class Order extends Model
{
    use HasFactory;
    use Filterable;

    public const USER = User::class;

    public const CATEGORY = Category::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    protected $fillable = [
        'id',
        'category_id',
        'user_id',
        'date',
        'from_time',
        'to_time',
        'name',
        'description',
        'created_at',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(static::CATEGORY);
    }
}
