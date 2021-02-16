<?php

namespace App\Traits\Base;

use App\Models\Status;

trait StatusTrait
{
    public function setDefaultStatus() {
        if (empty($this->state_id)) {
            $default_status = Status::default();
            if ($default_status) {
                $this->status_id = $default_status->first()->id;
            }
        }
    }

    public function activateStatus() {
        $active_status = Status::active()->first();
        if ($active_status) {
            $this->update([
                'status_id' => $active_status->id
            ]);
        }
    }

    public function deactivateStatus() {
        $inctive_status = Status::inactive()->first();
        if ($inctive_status) {
            $this->update([
                'status_id' => $inctive_status->id
            ]);
        }
    }
}
