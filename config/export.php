<?php

return [

    'crawl' => true,
'base_url' => 'http://127.0.0.1:8000', // або порт, на якому працює ваш Laravel-сервер

'paths' => [],

'include_files' => [
'public' => '',
],

/*
* Додайте цей блок коду для включення статичних ресурсів (CSS, JS, зображень, build).
*/
'assets' => [
'build', // додайте цю стрічку, щоб включити файли Vite
'css',
'js',
'images',
'media', // додайте це, щоб включити папку з іконками
],

'exclude_file_patterns' => [
'/\.php$/',
'/mix-manifest\.json$/',
],

'clean_before_export' => true,

'disk' => null,

'before' => [
// 'assets' => '/usr/local/bin/yarn production',
],

'after' => [
// 'deploy' => '/usr/local/bin/netlify deploy --prod',
],

];
