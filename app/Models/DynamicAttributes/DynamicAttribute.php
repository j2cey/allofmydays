<?php

namespace App\Models\DynamicAttributes;

use App\Models\BaseModel;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DynamicAttribute
 * @package App\Models\DynamicAttributes
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 * @property integer|null $status_id
 *
 * @property string $name
 * @property integer $num_ord
 * @property string|null $description
 *
 * @property string $offset
 * @property integer $max_length
 *
 * @property string $hasdynamicattribute_type
 * @property integer $hasdynamicattribute_id
 *
 * @property integer $dynamic_attribute_type_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class DynamicAttribute extends BaseModel implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $guarded = [];
    protected $with = ['values'];

    #region Validation Rules

    public static function defaultRules()
    {
        return [
            'name' => ['required'],
            'num_ord' => ['required'],
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

    public function attributetype() {
        return $this->belongsTo(DynamicAttributeType::class,"dynamic_attribute_type_id");
    }

    public function hasdynamicattribute()
    {
        return $this->morphTo();
    }

    public function values() {
        if ( is_null($this->attributetype) ) {
            return null;
        } else {
            return $this->hasMany($this->attributetype->model_type, "dynamic_attribute_id");
        }
    }

    #endregion

    #region Custom Functions

    public static function createNew($name,DynamicAttributeType $attribute_type,$description, $save = false): DynamicAttribute {
        $num_ord = 1;
        $dynamicattribute = new DynamicAttribute([
            'name' => $name,
            'num_ord' => $num_ord,
            'dynamic_attribute_type_id' => $attribute_type->id,
            'description' => $description,
        ]);

        if ($save) $dynamicattribute->save();

        return $dynamicattribute;
    }

    public function addValue($thevalue, $new_row = false) {
        if ($new_row) {
            $values_row = DynamicAttributeValueRow::createNew($this);
        } else {
            // get last row
            $values_row = $this->latestDynamicvaluerow;
        }
        return $this->attributetype->model_type::createNew($thevalue, $this, $values_row);
    }

    #endregion
}
