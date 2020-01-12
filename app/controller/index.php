<?php

$meta = [//meta etiketlerini eşitliyoruz
    'title' => setting('title'),
    'description' => setting('description'),
    'keywords' => setting('keywords')
];

require view('index');//index viewini require ediyoruz