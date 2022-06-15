<?php


namespace App\Traits\AnalysisRules;

use App\Models\AnalysisRules\AnalysisRule;

trait IsInnerRule
{
    abstract public function ruleFollowed($input) : bool;
    abstract public function ruleBroken($input) : bool;

    #region Eloquent Relationships

    public function analysisrule() {
        return $this->morphOne(AnalysisRule::class,"innerrule");
    }

    #endregion

    #region Custom Methods

    public function attachRule(AnalysisRule $upperrule) {
        $this->analysisrule()->save($upperrule);
    }

    #endregion

    protected function initializeIsInnerRule()
    {
       // $this->with = array_unique(array_merge($this->with, ['analysisrule']));
    }

    public static function bootIsInnerRule()
    {
        static::deleting(function ($model) {

        });
    }
}
