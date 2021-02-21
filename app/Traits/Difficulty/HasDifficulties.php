<?php

namespace App\Traits\Difficulty;

use App\Models\Difficulty;
use SebastianBergmann\Diff\Diff;

trait HasDifficulties
{
    public function difficulties() {
        $elem_type = get_called_class();
        return $this->belongsToMany(Difficulty::class, 'model_has_difficulties', 'model_id', 'difficulty_id')
            ->wherePivot('model_type', $elem_type)
            ->withPivot('posi')
            ->withTimestamps()
            ->orderBy('posi','asc');
    }

    public function addDifficulty($difficulty)
    {
        if ( is_null($difficulty) ) {
            return false;
        }

        $elem_type = get_called_class();

        $difficulties_count = $this->difficulties()->count();

        $this->difficulties()->attach($difficulty->id, [
            'model_type' => $elem_type,
            'model_id' => $this->id,
            'posi' => $difficulties_count,
        ]);
        return true;
    }
}
