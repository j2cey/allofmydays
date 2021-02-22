<?php

namespace App\Models;

use App\Traits\Code\HasCode;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Task
 * @package App\Models
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 *
 * @property string $title
 * @property string $code
 * @property string $description
 *
 * @property integer|null $task_parent_id
 * @property integer $subtask_posi
 *
 * @property integer|null $subject_id
 * @property integer $subject_posi
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Task extends BaseModel implements Auditable
{
    use HasFactory, HasCode, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'title' => ['required'],
            'code' => ['required'],
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

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function taskparent() {
        return $this->belongsTo(Task::class, 'task_parent_id');
    }

    #endregion

    #region Custom Functions

    public function setSubject($id) {
        $subject = Subject::where('id', $id)->first();
        if ($subject) {
            $this->subject()->associate($subject);
            $this->save();

            return 1;
        } else {
            return -1;
        }
    }

    #endregion
}
