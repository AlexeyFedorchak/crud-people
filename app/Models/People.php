<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class People extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'people';

    protected $fillable = [
        'name',
        'surname',
        'south_african_id_number',
        'mobile_number',
        'birth_date',
        'email',
        'language_id',
        'creator_id',
    ];

    /**
     * @return HasOne
     */
    public function language(): HasOne
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    /**
     * @return BelongsToMany
     */
    public function interests(): BelongsToMany
    {
        return $this->belongsToMany(
            Interests::class,
            'people_to_interests',
            'person_id',
            'interest_id'
        );
    }

    /**
     * @return HasOne
     */
    public function creator(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }
}
