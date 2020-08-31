<?php

namespace Voice\CustomFields\App\Http\Controllers;

use App\Http\Controllers\Controller; // Stock Laravel controller class
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Voice\CustomFields\App\CustomFieldValidation;

class CustomFieldValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(CustomFieldValidation::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $customFieldValidation = CustomFieldValidation::create($request->all());

        return response()->json($customFieldValidation);
    }

    /**
     * Display the specified resource.
     *
     * @param CustomFieldValidation $customFieldValidation
     * @return JsonResponse
     */
    public function show(CustomFieldValidation $customFieldValidation)
    {
        return response()->json($customFieldValidation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CustomFieldValidation $customFieldValidation
     * @return JsonResponse
     */
    public function update(Request $request, CustomFieldValidation $customFieldValidation)
    {
        $isUpdated = $customFieldValidation->update($request->all());

        return response()->json($isUpdated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CustomFieldValidation $customFieldValidation
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(CustomFieldValidation $customFieldValidation)
    {
        $isDeleted = $customFieldValidation->delete();

        return response()->json($isDeleted);
    }
}
