<?php

namespace App\Models\Orders;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $price
 * @property Carbon $deadline
 */
class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
