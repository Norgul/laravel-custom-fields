<?php

declare(strict_types=1);

namespace Asseco\CustomFields\App\Http\Controllers;

use Asseco\CustomFields\App\Http\Requests\CustomFieldRequest;
use Asseco\CustomFields\App\Models\CustomField;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @model CustomField
 */
class PlainCustomFieldController extends Controller
{
    protected array $mappings;

    public function __construct()
    {
        $this->mappings = config('asseco-custom-fields.type_mappings.plain');
    }

    /**
     * Display a listing of the resource.
     *
     * @path plain_type string One of the plain types (string, text, integer, float, date, boolean)
     * @multiple true
     *
     * @param string|null $type
     * @return JsonResponse
     */
    public function index(string $type = null): JsonResponse
    {
        return response()->json(CustomField::plain($type)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @path plain_type string One of the plain types (string, text, integer, float, date, boolean)
     * @except selectable_type selectable_id
     *
     * @param CustomFieldRequest $request
     * @param string $type
     * @return JsonResponse
     * @throws Exception
     */
    public function store(CustomFieldRequest $request, string $type): JsonResponse
    {
        /**
         * @var Model $typeModel
         */
        $typeModel = $this->mappings[$type];

        $selectableData = [
            'selectable_type' => $typeModel,
            'selectable_id'   => $typeModel::query()->first('id')->id,
        ];

        $customField = CustomField::query()->create($request->merge($selectableData)->except('type'));

        return response()->json($customField->refresh());
    }
}
