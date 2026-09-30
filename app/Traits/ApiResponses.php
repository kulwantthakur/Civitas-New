<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

/**
 * Trait for standardized API responses across controllers.
 * Provides consistent JSON response structure.
 */
trait ApiResponses
{
    /**
     * Return a success JSON response.
     *
     * @param mixed $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function successResponse($data = null, $message = 'Success', $statusCode = 200)
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];
        
        if ($data !== null) {
            $response['data'] = $data;
        }
        
        return response()->json($response, $statusCode);
    }

    /**
     * Return an error JSON response.
     *
     * @param mixed $errors
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function errorResponse($errors = null, $message = 'Error', $statusCode = 400)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];
        
        if ($errors !== null) {
            $response['errors'] = $errors;
        }
        
        return response()->json($response, $statusCode);
    }

    /**
     * Return a not found JSON response.
     *
     * @param string $message
     * @return JsonResponse
     */
    protected function notFoundResponse($message = 'Item not found.')
    {
        return $this->errorResponse(null, $message, 404);
    }

    /**
     * Return a validation error JSON response.
     *
     * @param mixed $errors
     * @return JsonResponse
     */
    protected function validationErrorResponse($errors)
    {
        return $this->errorResponse($errors, 'Validation failed', 422);
    }

    /**
     * Return a created JSON response.
     *
     * @param mixed $data
     * @param string $message
     * @return JsonResponse
     */
    protected function createdResponse($data = null, $message = 'Created successfully')
    {
        return $this->successResponse($data, $message, 201);
    }

    /**
     * Handle ajax or redirect response based on request type.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $errors
     * @return JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function handleValidationFailure($request, $errors)
    {
        if ($request->ajax()) {
            return $this->errorResponse($errors, 'Validation failed');
        }
        
        return redirect()->back()->withInput()->withErrors($errors);
    }
}
