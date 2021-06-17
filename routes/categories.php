<?php

Route::get('list', 'Categories@list')->name('list');
Route::get('tree', 'Categories@tree')->name('tree');
Route::get('{category}/filter-list', 'Categories@filterList')->name('filterlist');
