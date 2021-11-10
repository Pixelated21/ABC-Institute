<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\teacherSchedule
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $course_id
 * @property string $start
 * @property string $end
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|teacherAssignment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|teacherAssignment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|teacherAssignment query()
 * @method static \Illuminate\Database\Eloquent\Builder|teacherAssignment whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacherAssignment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacherAssignment whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacherAssignment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacherAssignment whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacherAssignment whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacherAssignment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class teacherAssignment extends Model
{
    protected $fillable = [
        'teacher_id',
        'course_id',

    ];
    use HasFactory;

    public function teacher(){
        return $this->belongsTo(teacher::class);
    }
    public function course(){
        return $this->belongsTo(course::class);
    }
}
