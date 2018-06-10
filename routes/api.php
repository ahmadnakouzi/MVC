<?php

class Routes
{
    function get()
    {
        $routes = [
            'customer' => [
                'index' => [
			        'method' => 'get',
                    'uses' => 'CustomerController@index'
                ]
            ],
        ];
        return $routes;
    }
}