<?php

Route::post('/getuser', 'user@getUsers');
Route::post('/data/user', 'user@getData');
Route::post('/user/edit', 'user@editar');
Route::post('/user/desactivar', 'user@desactivar');
Route::post('/user/avatar', 'user@subirAvatar');
Route::get('/user/avatar/get/{filename}', 'user@getAvatar');