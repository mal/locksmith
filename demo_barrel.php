<?php

namespace Locksmith;

class DemoBarrel
{
    public static function identity($in)
    {
        return $in;
    }
    
    public static function rot13($in)
    {
        return str_rot13($in);
    }
    
    public static function reverse($in)
    {
        return strrev($in);
    }

    public static function chunk($in)
    {
        $chunks = str_split($in, 3);
        array_push($chunks, array_shift($chunks));
        return join('', $chunks);
    }

    public static function shuffle($in)
    {
        $chrs = str_split($in);
        $out = array_fill(0, 3, '');
        foreach ( $chrs as $i => $chr )
            $out[$i % 3] .= $chr;
        return join('', $out);
    }

    public static function base64($in)
    {
        return base64_encode($in);
    }
}

