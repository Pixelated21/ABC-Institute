<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\role
 *
 * @property int $id
 * @property string $role_nm
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|role query()
 * @method static \Illuminate\Database\Eloquent\Builder|role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|role whereRoleNm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class role extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasMany(User::class);
    }

    protected $fillable = [
        'role_nm'
    ];
}
