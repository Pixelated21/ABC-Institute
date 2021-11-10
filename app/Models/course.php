<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\course
 *
 * @property int $id
 * @property string $course_nm
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|course query()
 * @method static \Illuminate\Database\Eloquent\Builder|course whereCourseNm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|course whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class course extends Model
{
    protected $fillable = [
      'course_nm',
        'days',
        'start',
        'end'
    ];
    use HasFactory;

    public function teacherAssignment(){
        return $this->hasMany(teacherAssignment::class);
    }

    public function group(){
        return $this->hasOne(group::class);
    }
}
