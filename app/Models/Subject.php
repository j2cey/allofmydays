<?php

namespace App\Models;

use App\Traits\Code\HasCode;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\ReflexiveRelationship\HasReflexivePath;

/**
 * Class Subject
 * @package App\Models
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 * @property integer|null $status_id
 *
 * @property string $title
 * @property string $full_path
 * @property string $code
 * @property string $description
 *
 * @property integer|null $subject_parent_id
 * @property integer $subsubject_posi
 *
 * @property integer|null $category_id
 * @property integer $category_posi
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Subject extends BaseModel implements Auditable
{
    use HasFactory, HasCode, HasReflexivePath, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    protected $with = ['status','tasks','subsubjects'];

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

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tasks() {
        return $this->hasMany(Task::class, 'subject_id');
    }

    public function subjectparent() {
        return $this->belongsTo(Subject::class, 'subject_parent_id');
    }

    public function subsubjects() {
        return $this->hasMany(Subject::class, 'subject_parent_id');
    }

    #endregion

    #region Custom Functions

    public function setCategory($id) {
        $category = Category::where('id', $id)->first();
        if ($category) {
            $this->category()->associate($category);
            $this->save();

            return 1;
        } else {
            return -1;
        }
    }

    public function setSubjectParent($id) {
        $subjectparent = Subject::where('id', $id)->first();
        if ($subjectparent) {
            $this->subjectparent()->associate($subjectparent);
            $this->save();

            return 1;
        } else {
            return -1;
        }
    }

    #endregion
    public static function getReflexiveParentIdField()
    {
        return "subject_parent_id";
    }

    public static function getTitleField()
    {
        return "title";
    }

    public static function getReflexiveFullPathField()
    {
        return "full_path";
    }

    public function getReflexiveChildrenRelationName()
    {
        return "subsubjects";
    }
}
