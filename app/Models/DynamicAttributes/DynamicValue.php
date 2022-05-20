<?php


namespace App\Models\DynamicAttributes;


use Illuminate\Database\Eloquent\Model;

abstract class DynamicValue extends Model
{
    #region Eloquent Relationships

    public function valuerow() {
        return $this->belongsTo(DynamicRow::class,"dynamic_attribute_value_row_id");
    }

    #endregion

    #endregion

    abstract static function createNew($thevalue, DynamicAttribute $dynamicattribute, DynamicRow $row);

    #endregion
}
