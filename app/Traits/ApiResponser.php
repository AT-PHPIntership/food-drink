<?php
namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser
{
    protected $unit = 20;
    /**
     * Return success Response
     *
     * @param Object     $data data to response
     * @param statusCode $code status code for response
     *
     * @return \Illuminate\Http\Response
     */
    protected function successResponse($data, $code)
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
     * Return error Response
     *
     * @param Object     $message data to response
     * @param statusCode $code    status code for response
     *
     * @return \Illuminate\Http\Response
     */
    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
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
            return $this->successResponse(['data' => $collection], $code);
        }
        $collection = $this->paginate($collection);
        
        return $this->successResponse($collection, $code);
    }
    
    /**
     * Show specific data of Model
     *
     * @param Illuminate\Database\Eloquent\Model $instance instance of Model
     * @param statusCode                         $code     status code for response
     *
     * @return \Illuminate\Http\Response
     */
    protected function showOne(Model $instance, $code = 200)
    {
        return $this->successResponse($instance, $code);
    }
    
    /**
     * Return error Response
     *
     * @param Object     $message data to response
     * @param statusCode $code    status code for response
     *
     * @return \Illuminate\Http\Response
     */
    protected function showMessage($message, $code = 200)
    {
        return $this->successResponse(['data' => $message], $code);
    }
    
    /**
     * Format Paginator input data
     *
     * @param Illuminate\Support\Collection $collection data to response
     *
     * @return Illuminate\Support\Collection
     */
    protected function paginate(Collection $collection)
    {
        $rules = [
            'unit' => 'integer|min:2|max:50'
        ];
        
        Validator::validate(request()->all(), $rules);
        
        $page = LengthAwarePaginator::resolveCurrentPage();
        if (request()->has('unit')) {
            $this->unit = request()->unit;
        }
        
        $result = $collection->slice(($page - 1) * $this->unit, $this->unit);
        
        $paginated = new LengthAwarePaginator($result, $collection->count(), $this->unit, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);
        
        $paginated->appends(request()->all());
        
        return $paginated;
    }

    /**
     * Format sortData input data
     *
     * @param Illuminate\Support\Collection $collection data to response
     *
     * @return Illuminate\Support\Collection
     */
    protected function sortData(Collection $collection)
    {
        if (request()->has('sort')) {
            $collection = $collection->sortBy(request()->sort);
        }
        
        return $collection->values();
    }
}
