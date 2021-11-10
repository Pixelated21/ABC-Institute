<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\group
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $student_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|group query()
 * @method static \Illuminate\Database\Eloquent\Builder|group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|group whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|group whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class group extends Model
{
    protected $fillable = [
      'course_id',
      'student_id',
    ];
    use HasFactory;

    public function course(){
        return $this->belongsTo(course::class);
    }

    public function student(){
        return $this->belongsTo(student::class);
    }
}
