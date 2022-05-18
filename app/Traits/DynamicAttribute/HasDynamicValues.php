<?php


namespace App\Traits\DynamicAttribute;


use App\Models\DynamicAttributes\DynamicAttribute;

trait HasDynamicValues
{
    /**
     * Get all of the model's dynamic attributes
     * @return mixed
     */
    public function dynamicvalues()
    {
        $model_type = get_called_class();
        return $this->morphMany($model_type, 'hasdynamicvalue');
    }


    /**
     * Get the lastets of the model's dynamic attributes
     * @return mixed
     */
    public function latestDynamicvalue()
    {
        $model_type = get_called_class();
        return $this->morphOne($model_type, 'hasdynamicattribute')->latestOfMany();
    }

    /**
     * Get the oldest of the model's dynamic attributes
     * @return mixed
     */
    public function oldestDynamicvalue()
    {
        return $this->morphOne(DynamicAttribute::class, 'hasdynamicattribute')->oldestOfMany();
    }

    public static function bootHasReportValue()
    {
        static::deleting(function ($model) {
            $model->dynamicattributes()->delete();
        });
    }
}
