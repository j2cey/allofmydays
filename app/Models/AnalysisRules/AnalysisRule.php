<?php

namespace App\Models\AnalysisRules;

use App\Models\BaseModel;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\DynamicAttributes\DynamicAttribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AnalysisRule
 * @package App\Models\AnalysisRules
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 * @property integer|null $status_id
 *
 * @property string $title
 * @property string $description
 *
 * @property string $innerrule_type
 * @property integer $innerrule_id
 *
 * @property boolean $alert_when_allowed
 * @property boolean $alert_when_broken
 *
 * @property integer|null $analysis_rule_type_id
 * @property integer|null $dynamic_attribute_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class AnalysisRule extends BaseModel implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $guarded = [];
    protected $with = ["innerrule"];

    #region Validation Rules

    public static function defaultRules()
    {
        return [
            'title' => ['required'],
            'analysisruletype' => ['required'],
        ];
    }

    public static function createRules()
    {
        return array_merge(self::defaultRules(), [

        ]);
    }

    public static function updateRules($model)
    {
        return array_merge(self::defaultRules(), [

        ]);
    }

    public static function messagesRules()
    {
        return [

        ];
    }

    #endregion

    #region Eloquent Relationships

    public function analysisruletype() {
        return $this->belongsTo(AnalysisRuleType::class,"analysis_rule_type_id");
    }

    public function dynamicattribute() {
        return $this->belongsTo(DynamicAttribute::class,"dynamic_attribute_id");
    }

    /**
     * @return HasMany
     * List of ALL Highlights to apply for this rule
     */
    public function highlights() {
        return $this->hasMany(AnalysisHighlight::class,"analysis_rule_id");
    }

    /**
     * @return HasMany
     * List of Highlights to apply when this rule is allowed
     */
    public function whenallowedhighlights() {
        return $this->hasMany(AnalysisHighlight::class,"analysis_rule_id")
            ->where("when_rule_result_is", 'allowed');
    }

    /**
     * @return HasMany
     * List of Highlights to apply when this rule is broken
     */
    public function whenbrokenhighlights() {
        return $this->hasMany(AnalysisHighlight::class,"analysis_rule_id")
            ->where("when_rule_result_is", 'broken');
    }

    /**
     * @return MorphTo
     * Get the parent inner rule model.
     */
    public function innerrule()
    {
        return $this->morphTo();
    }

    #endregion

    #region Custom Functions

    public function removeInnerRule()
    {
        $this->innerrule->delete();
    }

    public static function createNew(DynamicAttribute $dynamicattribute, AnalysisRuleType $ruletype, $title, $alert_when_allowed, $alert_when_broken, $description): AnalysisRule {

        $innerrule = $ruletype->model_type::createNew();

        $analysisrule = $innerrule->analysisrule()->create([
            'title' => $title,
            'alert_when_allowed' => $alert_when_allowed,
            'alert_when_broken' => $alert_when_broken,
            'description' => $description,
        ]);

        $analysisrule->dynamicattribute()->associate($dynamicattribute);
        $analysisrule->analysisruletype()->associate($ruletype);

        $analysisrule->save();

        return $analysisrule;
    }

    public function updateOne(AnalysisRuleType $ruletype, $title, $alert_when_allowed, $alert_when_broken, $description): AnalysisRule {

        $innerrule = $ruletype->model_type::createNew();

        $this->update([
            'title' => $title,
            'alert_when_allowed' => $alert_when_allowed,
            'alert_when_broken' => $alert_when_broken,
            'description' => $description,
        ]);

        $this->analysisruletype()->associate($ruletype);

        $this->save();

        return $this;
    }

    // Analysis Rule broken

    // Analysis Rule followed

    #endregion

    public static function boot(){
        parent::boot();

        static::deleting(function ($model) {
            $model->removeInnerRule();
        });
    }
}
