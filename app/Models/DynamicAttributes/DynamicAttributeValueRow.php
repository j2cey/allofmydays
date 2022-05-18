<?php

namespace App\Models\DynamicAttributes;

use App\Models\BaseModel;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use phpDocumentor\Reflection\Types\This;

/**
 * Class DynamicAttributeValueRow
 * @package App\Models\DynamicAttributes
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 * @property integer|null $status_id
 *
 * @property string $line_uuid
 * @property integer $line_num
 *
 * @property Carbon $firstinserted_at
 * @property Carbon $lastinserted_at
 *
 * @property string $hasdynamicvaluerow_type
 * @property integer $hasdynamicvaluerow_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class DynamicAttributeValueRow extends BaseModel implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'line_uuid' => ['required'],
            'line_num' => ['required'],
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

    public function hasdynamicvaluerow()
    {
        return $this->morphTo();
    }

    #endregion

    #region Custom Functions

    public static function createNew(DynamicAttribute $dynamicattribute) {
        $line_num = DynamicAttributeValueRow::where('hasdynamicvaluerow_type',$dynamicattribute->hasdynamicattribute_type)
                ->where('hasdynamicvaluerow_id', $dynamicattribute->hasdynamicattribute_id)->count() + 1;
        return DynamicAttributeValueRow::create([
            'line_uuid' => self::generateUuid(),
            'line_num' => $line_num,
            'firstinserted_at' => Carbon::now(),
            'hasdynamicvaluerow_type' => $dynamicattribute->hasdynamicattribute_type,
            'hasdynamicvaluerow_id' => $dynamicattribute->hasdynamicattribute_id,
        ]);
    }

    #endregion
}
