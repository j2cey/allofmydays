<?php


namespace App\Traits\DynamicAttribute;


use App\Models\DynamicAttributes\DynamicRow;

trait HasDynamicRows
{
    /**
     * Get all of the model's dynamic attributes
     * @return mixed
     */
    public function dynamicvaluerows()
    {
        return $this->morphMany(DynamicRow::class, 'hasdynamicrow');
    }

    /**
     * Get the lastets of the model's dynamic attributes
     * @return mixed
     */
    public function latestDynamicvaluerow()
    {
        return $this->morphOne(DynamicRow::class, 'hasdynamicrow')->latestOfMany();
    }

    /**
     * Get the oldest of the model's dynamic attributes
     * @return mixed
     */
    public function oldestDynamicvaluerow()
    {
        return $this->morphOne(DynamicRow::class, 'hasdynamicrow')->oldestOfMany();
    }
}
