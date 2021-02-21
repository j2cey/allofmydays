<?php

namespace App\Traits\Priority;

use App\Models\Priority;

trait HasPriorities
{
    public function priorities() {
        $elem_type = get_called_class();
        return $this->belongsToMany(Priority::class, 'model_has_priorities', 'model_id', 'priority_id')
            ->wherePivot('model_type', $elem_type)
            ->withPivot('posi')
            ->withTimestamps()
            ->orderBy('posi','asc');
    }

    public function addPriority($priority)
    {
        if ( is_null($priority) ) {
            return false;
        }

        $elem_type = get_called_class();

        $priorities_count = $this->priorities()->count();

        $this->priorities()->attach($priority->id, [
            'model_type' => $elem_type,
            'model_id' => $this->id,
            'posi' => $priorities_count,
        ]);
        return true;
    }
}
