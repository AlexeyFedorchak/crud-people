<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleToInterests extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'people_to_interests';

    /**
     * @var string[]
     */
    protected $fillable = [
        'interest_id',
        'person_id',
    ];
}
