<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponse
{
    /**
     * Response detail of data
     *
     * @param object $data instance
     * @param int    $code response status
     *
     * @return \Illuminate\Http\Response
     */
    protected function responseSuccess($data = [], $code = 200)
    {
        return response()->json([
            'meta' => [
                'status' => __('api.successfully'),
                'code' => $code
            ],
            'data' => $data
        ], $code);
    }
    /**
     * Response list data
     *
     * @param LengthAwarePaginator $responseData list resource
     * @param int                  $code         response status
     *
     * @return \Illuminate\Http\Response
     */
    protected function responsePaginate(LengthAwarePaginator $responseData, $code = 200)
    {
        return response()->json([
            'meta' => [
                'status' => __('api.successfully'),
                'code' => $code
            ],
            'data' => $responseData->toArray()['data'],
            'pagination' => [
                'total' => $responseData->total(),
                'per_page' => $responseData->perPage(),
                'current_page' => $responseData->currentPage(),
                'total_pages' => $responseData->lastPage(),
                'links' => [
                     'prev' => $responseData->previousPageUrl(),
                     'next' => $responseData->nextPageUrl(),
                ]
            ],
        ], $code);
    }
    /**
     * Response delete data
     *
     * @param int $code response status
     *
     * @return \Illuminate\Http\Response
     */
    protected function responseDeleteSuccess($code = 200)
    {
        return response()->json([
            'meta' => [
                'status' => __('api.successfully'),
                'code' => $code
            ],
        ], $code);
    }

    /**
     * Show All data of a Collection
     *
     * @param Illuminate\Support\Collection $collection data to response
     * @param statusCode                    $code       status code for response
     *
     * @return \Illuminate\Http\Response
     */
    protected function showAll(Collection $collection, $code = 200)
    {
        if ($collection->isEmpty()) {
            return $this->responseSuccess(['data' => $collection], $code);
        }
        return $this->responseSuccess($collection, $code);
    }
}
