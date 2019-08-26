<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],
         // Database connection settings           
          "db" => [
            'host' => 'us-cdbr-iron-east-02.cleardb.net',
            'dbname' => 'heroku_dd756aadddfcc21',
            'user' => 'bfc11bf3f224a3',
            'pass' => '8ddc027f'
        ],
    ],
];
