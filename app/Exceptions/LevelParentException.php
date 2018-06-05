<?php

namespace App\Exceptions;

use Exception;

class LevelParentException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        flash(trans('category.admin.message.fail_edit'))->error();
    }
}
