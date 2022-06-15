<?php

namespace App\Http\Requests\AnalysisRule;



use App\Models\AnalysisRules\AnalysisRule;

class UpdateAnalysisRuleRequest extends AnalysisRuleRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return AnalysisRule::updateRules($this->analysisrule);
    }
}
