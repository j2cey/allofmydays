<?php


namespace App\Traits\DynamicAttribute;


use App\Models\DynamicAttributes\DynamicAttribute;
use App\Models\DynamicAttributes\DynamicAttributeType;

trait HasDynamicAttributes
{
    use HasDynamicValuesRows;

    /**
     * Get all of the model's dynamic attributes
     * @return mixed
     */
    public function dynamicattributes()
    {
        return $this->morphMany(DynamicAttribute::class, 'hasdynamicattribute');
    }


    /**
     * Get the lastets of the model's dynamic attributes
     * @return mixed
     */
    public function latestDynamicattribute()
    {
        return $this->morphOne(DynamicAttribute::class, 'hasdynamicattribute')->latestOfMany();
    }

    /**
     * Get the oldest of the model's dynamic attributes
     * @return mixed
     */
    public function oldestDynamicattribute()
    {
        return $this->morphOne(DynamicAttribute::class, 'hasdynamicattribute')->oldestOfMany();
    }


    public function addDynamicAttribute($name,DynamicAttributeType $attribute_type,$description) {
        $dynamicattribute = DynamicAttribute::createNew($name,$attribute_type,$description, false);
        $this->dynamicattributes()->save($dynamicattribute);
    }

    public static function bootHasReportValue()
    {
        static::deleting(function ($model) {
            $model->dynamicattributes()->delete();
        });
    }
}