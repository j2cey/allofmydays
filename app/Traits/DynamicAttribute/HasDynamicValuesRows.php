<?php


namespace App\Traits\DynamicAttribute;


use App\Models\DynamicAttributes\DynamicAttributeValueRow;

trait HasDynamicValuesRows
{
    /**
     * Get all of the model's dynamic attributes
     * @return mixed
     */
    public function dynamicvaluerows()
    {
        return $this->morphMany(DynamicAttributeValueRow::class, 'hasdynamicvaluerow');
    }

    /**
     * Get the lastets of the model's dynamic attributes
     * @return mixed
     */
    public function latestDynamicvaluerow()
    {
        return $this->morphOne(DynamicAttributeValueRow::class, 'hasdynamicvaluerow')->latestOfMany();
    }

    /**
     * Get the oldest of the model's dynamic attributes
     * @return mixed
     */
    public function oldestDynamicvaluerow()
    {
        return $this->morphOne(DynamicAttributeValueRow::class, 'hasdynamicvaluerow')->oldestOfMany();
    }
}
