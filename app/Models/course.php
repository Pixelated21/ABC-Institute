<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\course
 *
 * @property int $id
 * @property string $course_nm
 * @property string $days
 * @property string $start
 * @property string $end
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|course newModelQuery()
 * @method static Builder|course newQuery()
 * @method static Builder|course query()
 * @method static Builder|course whereCourseNm($value)
 * @method static Builder|course whereCreatedAt($value)
 * @method static Builder|course whereId($value)
 * @method static Builder|course whereUpdatedAt($value)
 * @mixin Eloquent
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

    public function teacherAssignment()
    {
        return $this->hasMany(teacherAssignment::class);
    }


    public function group()
    {
        return $this->hasOne(group::class);
    }
}
