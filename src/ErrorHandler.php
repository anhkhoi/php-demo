<?php

class ErrorHandler
{

    /**
     * Suppress specified errors while executing a callback.
     *
     * @param callable $callback The function to execute.
     * @param callable|null $filter Filter for errors to suppress (default suppresses E_WARNING).
     * @return mixed The result of the callback.
     */
    public static function suppressError(callable $callback, callable $filter = null, &$errorMessage = null)
    {
        $message = null;
        // Define default filter (suppress E_WARNING)
        $filter = $filter ?? function ($errNo, $errMsg) use (&$errorMessage) {
            $errorMessage = $errMsg;
            return $errNo === E_WARNING || $errNo === E_NOTICE;
        };

        // echo '<pre>';
        // print_r($errorMessage);
        // echo '</pre>';
        
        // Custom error handler
        $errorHandler = function ($errNo, $errMsg, $errFile, $errLine) use ($filter, &$errorMessage) {
            // $errorMessage = $errMsg;
            if ($filter($errNo, $errMsg)) {
                // Suppress error if filter matches
                return true;
            }
            // Return false to let PHP handle the error as usual
            return false;
        };

        // Register global error handler
        set_error_handler($errorHandler);

        try {
            // Execute callback
            return $callback($message);
        } finally {
            // Restore default error handler
            restore_error_handler();
        }
    }
}
