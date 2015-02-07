<?php
namespace App\Error;

use Cake\Error\BaseErrorHandler;

class AppError extends BaseErrorHandler
{
    public function _displayError($error, $debug)
    {
        header('Access-Control-Allow-Origin: *');
        return 'There has been an error!';
    }
    public function _displayException($exception)
    {
        header('Access-Control-Allow-Origin: *');
        return 'There has been an exception!';
    }
    public function handleFatalError($code, $description, $file, $line)
    {
        header('Access-Control-Allow-Origin: *');
        return 'A fatal error has happened';
    }
}

?>