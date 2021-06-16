<?php

Route::get('list', 'Products@list')->name('list');
Route::get('{category}/filter-list', 'Products@filterList')->name('filterlist');
// Route::resource('products', 'Products');
