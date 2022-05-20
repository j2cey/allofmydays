<?php

namespace App\Models\DynamicAttributes;


use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DynamicValueInteger
 * @package App\Models\DynamicAttributes
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 * @property integer|null $status_id
 *
 * @property integer $thevalue
 * @property integer $dynamic_attribute_value_row_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class DynamicValueInteger extends DynamicValue implements Auditable
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

    public function valuerow() {
        return $this->belongsTo(DynamicRow::class,"dynamic_attribute_value_row_id");
    }

    #endregion

    #region Custom Functions

    public static function createNew($thevalue, DynamicAttribute $dynamicattribute, DynamicRow $row) {

        $dynamicvalue = DynamicValueDatetime::create([
            'thevalue' => intval($thevalue),
            'dynamic_attribute_id' => $dynamicattribute->id,
            'dynamic_attribute_value_row_id' => $row->id,
        ]);
        $row->setLastInserted();
        return $dynamicvalue;
    }

    #endregion
}
