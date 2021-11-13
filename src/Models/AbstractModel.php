<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BasicModelTrait;

/**
 * Class AbstractModel
 * @package App\Models
 */
class AbstractModel extends Model
{
    use HasFactory, BasicModelTrait;

    protected $guarded = [];
}
