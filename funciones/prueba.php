<?php

    function multiple ( array $_files, $top = true )
    {
        $files = [];
        foreach($_files as $name => $file){
            if( $top )
                $sub_name = $file[ 'name' ]; else    $sub_name = $name;

            if( is_array($sub_name) ){
                foreach(array_keys($sub_name) as $key){
                    $files[ $name ][ $key ] = [ 'name' => $file[ 'name' ][ $key ], 'type' => $file[ 'type' ][ $key ], 'tmp_name' => $file[ 'tmp_name' ][ $key ], 'error' => $file[ 'error' ][ $key ], 'size' => $file[ 'size' ][ $key ], ];
                    $files[ $name ] = multiple($files[ $name ], false);
                }
            } else{
                $files[ $name ] = $file;
            }
        }
        return $files;
    }