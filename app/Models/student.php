<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|student query()
 * @method static \Illuminate\Database\Eloquent\Builder|student whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student whereFname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student whereLname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student wherePhoneNbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student whereUserId($value)
 * @mixin \Eloquent
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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function group(){
        return $this->belongsTo(group::class);
    }
}
