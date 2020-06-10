<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@homepage');

Route::get('about', 'PagesController@about');

Route::get('siswa', 'SiswaController@index');

Route::get('siswa/create', 'SiswaController@create');

Route::get('siswa/{siswa}', 'SiswaController@show');

Route::post('siswa', 'SiswaController@store');

Route::get('siswa/{siswa}/edit', 'SiswaController@edit');

Route::patch('siswa/{siswa}', 'SiswaController@update');

Route::delete('siswa/{siswa}', 'SiswaController@destroy');

Route::get('tes-collection', 'SiswaController@tesCollection');

Route::get('date-mutator', 'SiswaController@dateMutator');

// Route::get('sampledata',function(){
//     DB::table('siswa')->insert([
//         [
//             'nisn'          => '1008',
//             'nama_siswa'    => 'Galang Rambu Anarki',
//             'tanggal_lahir' => '1991-12-11',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2019-03-10 19:10:10',
//             'updated_at'    => '2019-03-10 19:10:10'
//         ],
//         [
//             'nisn'          => '1009',
//             'nama_siswa'    => 'Galang Taat Rambu',
//             'tanggal_lahir' => '1991-10-11',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2019-03-10 19:10:10',
//             'updated_at'    => '2019-03-10 19:10:10'
//         ],
//         [
//             'nisn'          => '1010',
//             'nama_siswa'    => 'Galang Hobi Anarki',
//             'tanggal_lahir' => '1991-12-11',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2019-03-10 19:10:10',
//             'updated_at'    => '2019-03-10 19:10:10'
//         ],
//     ]);
// });