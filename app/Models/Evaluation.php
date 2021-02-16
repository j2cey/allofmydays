<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Traits\GradeUnit\HasGradeUnit;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Evaluation
 * @package App\Models
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 *
 * @property integer $title
 * @property string $description
 *
 * @property integer|null $grade_unit_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Evaluation extends BaseModel implements Auditable
{
    use HasFactory, HasGradeUnit, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'title' => ['required'],
        ];
    }
    public static function createRules() {
        return array_merge(self::defaultRules(), [

        ]);
    }
    public static function updateRules($model) {
        return array_merge(self::defaultRules(), [

        ]);
    }

    public static function messagesRules() {
        return [

        ];
    }

    #endregion

    #region Eloquent Relationships

    public function unit() {
        return $this->belongsTo(GradeUnit::class, 'grade_unit_id');
    }

    public function grades() {
        return $this->hasMany(Grade::class, 'evaluation_id');
    }

    public function durations() {
        return $this->hasMany(Duration::class, 'evaluation_id');
    }

    #endregion

    #region Custom Functions

    public function addGrade($value, GradeUnit $unit, $description) {
        if ($this->isSameOrAffiliated($this->grade_unit_id, $unit->id)) {
            $grades_count = $this->grades()->count();
            $new_grade = $this->grades()->create([
                'value' => $value,
                'description' => $description,
                'grade_posi' => $grades_count
            ]);

            return 1;
        } else {
            return -1;
        }
    }

    /**
     * Set the unit of the grade
     * @param GradeUnit $unit
     * @return int
     */
    public function setUnit(GradeUnit $unit) {
        $this->unit()->associate($unit);
        $this->save();

        return 1;
    }

    public function addDuration($start_at, $description) {
        $durations_count = $this->durations()->count();
        $new_duration = $this->durations()->create([
            'start_at' => $start_at,
            'description' => $description,
            'duration_posi' => $durations_count
        ]);

        return 1;
    }

    public function startDuration($description) {
        $this->addDuration(Carbon::now(), $description);
    }

    public function endDuration() {
        $last_duration_posi = $this->durations()->count() - 1;
        $last_duration = $this->durations()
            ->where('duration_posi', $last_duration_posi)->get();
        $last_duration->setEnd();
    }

    #endregion
}
