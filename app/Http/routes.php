<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('chat');
});
////////////
use Illuminate\Support\Facades\App;

Route::get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
                      'test-event',
                      array('text' => 'Preparing the Pusher Laracon.eu workshop! Hello'));

    return view('welcome');
});
////////////
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestEvent implements ShouldBroadcast
{
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function broadcastOn()
    {
        return ['test-channel'];
    }
}
////////////
Route::get('/broadcast', function() {
    event(new TestEvent('Broadcasting in Laravel using Pusher!'));

    return view('welcome');
});

Route::controller('notifications', 'NotificationController');

Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::controller('activities', 'ActivityController');

Route::controller('chat', 'ChatController');
