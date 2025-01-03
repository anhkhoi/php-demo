<?php 

function suppressError(callable $callback, string &$errorMessage = null)
{
    $errors = [];

    // Register custom error handler
    set_error_handler(function ($errNo, $errMsg, $errfile, $errline) use (&$errors) {
        $errors[] = $errMsg;
        return true; // Prevent default error handler
    });

    try {
        return $callback();
    } catch (\Throwable $e) {
        $errors[] = $e->getMessage();
        return null;
    } finally {
        // Restore default error handler
        restore_error_handler();

        // Set error message if any errors occurred
        $errorMessage = implode(PHP_EOL, $errors);
    }
}

function parseXmlRequestBody($requestBody)
	{
		// Set internal libxml error handling to true
		$previous = libxml_use_internal_errors(true);

		try {
			// Attempt to load the XML string
			$requestBodyObject = simplexml_load_string($requestBody);
			if ($requestBodyObject === false) {
				// If loading fails, get the last XML error and clear the errors
				$error = libxml_get_last_error();
				libxml_clear_errors();

				// Throw an exception with the error message
				throw new Exception(
					'Invalid SOAP Envelope from client: ' . ($error ? $error->message : 'Unknown error'),
				);
			}

			// Return the parsed XML object
			return $requestBodyObject;
		} catch (\Exception $e) {
			// Handle the exception if needed
			throw $e;
		} finally {
			// Restore previous libxml error handling
			libxml_use_internal_errors($previous);
		}
	}
    
    function replacePhrases(string $search, string $replacement, string $subject): string {
        return str_replace($search, $replacement, $subject);
    }

    function replacePhraseszz(string $subject, array $replacements): string {
        foreach ($replacements as $search => $replace) {
            $subject = str_replace($search, $replace, $subject);
        }
        return $subject;
    }
    
    // Usage example
    // $result = replacePhraseszz('foo is good', ['foo' => 'baz', 'good' => 'great']);
    // Output: "baz is great"
    