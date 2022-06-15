<?php

namespace App\Http\Requests\AnalysisRule;

use App\Traits\Request\RequestTraits;
use App\Models\AnalysisRules\AnalysisRule;
use Illuminate\Foundation\Http\FormRequest;

class AnalysisRuleRequest extends FormRequest
{
    use RequestTraits;

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
        return AnalysisRule::defaultRules();
    }
}
