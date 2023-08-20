<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use YellowDigital\LaravelChatgptMockApi\Facades\ChatGPTMockApi;
use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminEmail;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/posts-amount', function() {
    return Blog::get()->count();
});

Route::get('/posts', function() {
    return Blog::latest('id')->take(request('limit'))->get();
});

Route::get('/more-posts', function() {
    $skip = (request('page') * request('limit')) - request('limit');
    return Blog::latest('id')->skip($skip)->take(request('limit'))->get();
});

Route::get('/posts/{slug}', function($slug) {
    return Blog::where('slug', $slug)->with([
        'comments' => function ($query) {
            $query->where('status', true)->latest('comment_id');
        }
    ])->first();
});

Route::post('/contact', function() {

    request()->validate([
        'name' => 'bail|required|string|min:2|max:20|regex:/^[\w. \.\_\-]+$/iu',
        'email' => 'bail|required|regex:/^[\w.\-]{2,30}@[\w\-]{2,30}\.[A-Za-z]{2,8}$/',
        'text' => 'bail|required|string|min:5|max:300|regex:/^[\w. \-\:\;\?\!\@\,]+$/iu',
    ]);

    Contact::create([
        'name'     => request('name'),
        'email'    => trim(request('email')),
        'message'  => trim(request('text')),
        'contact_ip' => request()->ip(),
    ]);

    $data = [
        'name'  => request('name'),
        'email' => request('email')
    ];

    Mail::to(request('email'))->send(new AdminEmail($data));
});
