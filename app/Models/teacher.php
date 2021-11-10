<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\teacher
 *
 * @property int $id
 * @property int $user_id
 * @property string $fname
 * @property string $lname
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacher whereFname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacher whereLname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacher whereUserId($value)
 * @mixin \Eloquent
 */
class teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function teacherAssignment(){
        return $this->hasMany(teacherAssignment::class);
    }



}
