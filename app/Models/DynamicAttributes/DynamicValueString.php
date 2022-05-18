<?php

namespace App\Models\DynamicAttributes;


use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DynamicValueString
 * @package App\Models\DynamicAttributes
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 * @property integer|null $status_id
 *
 * @property string $thevalue
 * @property integer $dynamic_attribute_id
 * @property integer $dynamic_attribute_value_row_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class DynamicValueString extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    #region Validation Rules

    public static function defaultRules()
    {
        return [
            'thevalue' => ['required'],
        ];
    }

    public static function createRules()
    {
        return array_merge(self::defaultRules(), [

        ]);
    }

    public static function updateRules($model)
    {
        return array_merge(self::defaultRules(), [

        ]);
    }

    public static function messagesRules()
    {
        return [

        ];
    }

    #endregion

    #region Eloquent Relationships

    public function dynamicattribute() {
        return $this->belongsTo(DynamicAttribute::class,"dynamic_attribute_id");
    }

    public function valuerow() {
        return $this->belongsTo(DynamicAttributeValueRow::class,"dynamic_attribute_value_row_id");
    }

    #endregion

    #region Custom Functions

    public static function createNew($thevalue, DynamicAttribute $dynamicattribute, DynamicAttributeValueRow $row) {
        return DynamicValueString::create([
            'thevalue' => $thevalue,
            'dynamic_attribute_id' => $dynamicattribute->id,
            'dynamic_attribute_value_row_id' => $row->id,
        ]);
    }

    #endregion
}