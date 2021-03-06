<?php

declare(strict_types=1);

namespace Asseco\CustomFields\App\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * @group Custom Field Type-Class Mappings
 */
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @response
     * plain array[string] true
     * remote string
     * selection string
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(config('asseco-custom-fields.type_mappings'));
    }
}
