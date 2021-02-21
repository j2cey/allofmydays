<?php

namespace App\Traits\Appreciation;

use App\Models\Appreciation;

trait HasAppreciations
{
    public function appreciations() {
        $elem_type = get_called_class();
        return $this->belongsToMany(Appreciation::class, 'model_has_appreciations', 'model_id', 'appreciation_id')
            ->wherePivot('model_type', $elem_type)
            ->withPivot('posi')
            ->withTimestamps()
            ->orderBy('posi','asc');
    }

    public function addAppreciation($appreciation)
    {
        if ( is_null($appreciation) ) {
            return false;
        }

        $elem_type = get_called_class();

        $appreciations_count = $this->appreciations()->count();

        $this->appreciations()->attach($appreciation->id, [
            'model_type' => $elem_type,
            'model_id' => $this->id,
            'posi' => $appreciations_count,
        ]);
        return true;
    }
}
