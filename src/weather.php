<?php 

// just replicate the case in NewBook repo
echo PHP_VERSION . '<br/>';

echo error_reporting(E_ALL | E_NOTICE | E_USER_NOTICE) . '<br/>';



// var_dump($errorHandler);

foreach ([1, 2] as $num) {
    // echo '<pre>';
    // print_r($num);
    // echo '</pre>';
    $errorHandler = set_error_handler(function() use ($num) {
        throw new Exception('zzcustom error handler: ' . $num);
    });
    try {
        // echo $someUnExistingVariable;
        // include 'abc';
        abc();
        // $dividingByZero = 10 / 0;
        // file_get_contents('http://example.com/data');
    } catch (Throwable $th) {
        echo '<pre>';
        print_r('Error caught: '. $th->getMessage());
        echo '</pre>';
    } finally {
        restore_error_handler();
    }
}

die();

class NewBook {
    const EXCEPTION_DEBUG = 9001; // it's over 9000

    const OTHER_CODE = 123;
}

class Weather {
    

    public static function fetch_remote_data($weatherCode) {
        // $weather_json = json_decode('{}');
        $weather_json = null;
        if ($weather_json !== null) { // expected is XML instead of json
            throw new Exception('OpenWeatherMap JSON Response', NewBook::EXCEPTION_DEBUG);
        }

        throw new Error('This is an error exception.', NewBook::EXCEPTION_DEBUG);

        $weather_xml = false;
        if (!$weather_xml) {
            throw new Exception('OpenWeatherMap XML did not successfully parse', NewBook::OTHER_CODE);
        }
    }
}

// set_error_handler(function($errno, $errstr, $errfile, $errline) {
//     throw new ErrorException($errstr, $errno, $errno, $errfile, $errline);
// });
// restore_error_handler();
// clearstatcache();

try {
    $weather_codes = [1, 2];
    foreach ($weather_codes as $weather_code) {
        // set_error_handler(function($errno, $errstr, $errfile, $errline) {
        //     throw new Exception($errstr, $errno, $errno, $errfile, $errline);
        // });  
        try {
            Weather::fetch_remote_data($weather_code);
        } catch (\Exception $e) {
            if ($e->getCode() != NewBook::EXCEPTION_DEBUG) {
                echo '<pre>';
                print_r('Not Debug Code: ' . $e->getCode());
                echo '</pre>';
            }
            echo '<pre>';
            print_r('Second try-catch level: ' . $e->getCode() . ' - ' . $e->getMessage());
            echo '</pre>';
        } finally {
            // restore_error_handler();
        }
    }
} catch (\Throwable $th) {
    //throw $th;
    echo '<pre>';
    print_r('Top try-catch level');
    echo '</pre>';
}