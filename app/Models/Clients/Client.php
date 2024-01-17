<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $phone
 * @property string $email
 */
class Client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
