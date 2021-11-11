<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\student
 *
 * @property int $id
 * @property int $user_id
 * @property string $fname
 * @property string $lname
 * @property string $age
 * @property string $gender
 * @property string $phone_nbr
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static Builder|student newModelQuery()
 * @method static Builder|student newQuery()
 * @method static Builder|student query()
 * @method static Builder|student whereAge($value)
 * @method static Builder|student whereCreatedAt($value)
 * @method static Builder|student whereFname($value)
 * @method static Builder|student whereGender($value)
 * @method static Builder|student whereId($value)
 * @method static Builder|student whereLname($value)
 * @method static Builder|student wherePhoneNbr($value)
 * @method static Builder|student whereUpdatedAt($value)
 * @method static Builder|student whereUserId($value)
 * @mixin Eloquent
 */
class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_nbr',
        'gender',
        'lname',
        'fname',
        'age'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(group::class);
    }
}
