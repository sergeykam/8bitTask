<?php
header('Content-Type: application/json');

$data = [
    'success' => true,
    'data'    => [
        'locations' => [
            [
                'name' => 'Eiffel Tower',
                'coordinates' => [
                    'lat' => 21.12,
                    'long' => 19.56
                ]
            ]
        ]
    ]
];

//$data = [
//    'data'=> [
//        'message'=> 'string error message',
//        'code'=> 'string error code',
//    ],
//    'success'=> false
//];

echo json_encode($data);