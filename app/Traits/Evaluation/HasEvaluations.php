<?php

namespace App\Traits\Evaluation;

use App\Models\Evaluation;

trait HasEvaluations
{
    /**
     * Get the evaluations of the model
     * @return mixed
     */
    public function evaluations() {
        $elem_type = get_called_class();
        return $this->belongsToMany(Evaluation::class, 'model_has_evaluations', 'model_id', 'evaluation_id')
            ->wherePivot('model_type', $elem_type)
            ->withPivot('posi')
            ->withTimestamps()
            ->orderBy('posi','asc');
    }

    public function addEvaluation($evaluation)
    {
        if (is_null($evaluation)) {
            return false;
        }

        $elem_type = get_called_class();

        $evaluations_count = $this->evaluations()->count();

        $this->evaluations()->attach($evaluation->id, [
            'model_type' => $elem_type,
            'model_id' => $this->id,
            'posi' => $evaluations_count,
        ]);
        return true;
    }
}
