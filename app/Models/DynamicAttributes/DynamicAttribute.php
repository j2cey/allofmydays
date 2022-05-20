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
    //protected $with = ['values'];

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

    public function dynamicvalues() {
        return $this->hasMany(DynamicValue::class, "dynamic_attribute_id");
    }

    #endregion

    #region Custom Functions

    public static function createNew($object,$name,DynamicAttributeType $attribute_type,$description): DynamicAttribute {
        $num_ord = 1;
        return DynamicAttribute::create([
            'name' => $name,
            'num_ord' => $num_ord,
            'dynamic_attribute_type_id' => $attribute_type->id,
            'hasdynamicattribute_type' => get_class($object),
            'hasdynamicattribute_id' => $object->id,
            'description' => $description,
        ]);
    }

    public function addValue($thevalue, $new_row = false) {
        if ($new_row) {
            $values_row = DynamicRow::createNew($this);
        } else {
            // get last row
            $values_row = $this->hasdynamicattribute->latestDynamicvaluerow;
        }
        return $this->attributetype->model_type::createNew($thevalue, $this, $values_row);
    }

    #endregion
}
