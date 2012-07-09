<?php

namespace Locksmith;

class Lock
{
    // lock pins
    private $pins = array();

    public function __construct($barrels)
    {
        // get all barrels provided
        $barrels = func_get_args();

        // install them in out mega lock
        foreach ( $barrels as $barrel )
        {
            // grab class
            $barrel = new \ReflectionClass('\\' . $barrel);

            // and each static method in it
            $pins = $barrel->getMethods(\ReflectionMethod::IS_STATIC);

            // they will be out pins
            foreach ( $pins as $pin )
            {
                // install pin as callable
                $this->pins[] = array($pin->class, $pin->name);
            }
        }
    }

    public function hash($key, $data = null)
    {
        // if no data, assume key is data
        $data = $data ? $data : $key;

        // convert key to binary
        $key = is_int($key) ? decbin($key)
            : preg_replace_callback('/./', function ($a) {
                return base_convert(ord($a[0]), 10, 2);
            }, $key);

        // for educational puposes
        echo $key . PHP_EOL;

        // split and reverse the binary key
        $key = array_reverse(str_split($key));

        // count the number of pins in the lock
        $pins = count($this->pins);

        // ensure something is done
        for ( $i = ($key & 8) + 2; $i > 0; $i-- )
            $data = sha1($data);

        // count notches on key
        $notch = count($key) - 1;

        // iterate over each notch
        for ( ; $notch > -1; $notch-- )
        {
            // if it's a peak transform data
            if ( $key[$notch] )
            {
                // using the pin at this location
                $pin = $this->pins[$notch % $pins];
                // learning can be fun
                echo $pin[1] . PHP_EOL;
                // update value
                $data = call_user_func($pin, $data);
            }
        }

        // hash to limit length
        $data = sha1($data);

        // locked
        return $data;
    }
}

if ( __FILE__ === array_shift(get_included_files()) && $argc > 1 )
{
    require 'demo_barrel.php';
    $lock = new Lock('Locksmith\DemoBarrel');
    echo $lock->hash($argv[1], $argv[2]);
}
