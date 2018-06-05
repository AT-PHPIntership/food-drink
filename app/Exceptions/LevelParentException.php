<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class LevelParentException extends Exception
{
    protected $statusCode = Response::HTTP_CONFLICT;
    protected $message = 'Faily Edit Category!';
}
