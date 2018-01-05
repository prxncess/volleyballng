<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',['as'=>'home','uses'=>'PagesController@index']);
Route::get('/Events',['as'=>'events','uses'=>'PagesController@events']);
Route::get('/Terms',['as'=>'terms','uses'=>'PagesController@terms']);

Route::get('/EventsCalender',['as'=>'EventsCal','uses'=>'PagesController@events_calender']);
Route::get('/CreateEvent',['as'=>'newEvent','uses'=>'EventsPagesController@new_event']);
Route::post('/CreateEvent',['as'=>'newEvent','uses'=>'EventsPagesController@save_event']);
Route::get('/sendMail','EventsPagesController@basic_email');
Route::get('/getCalendarEvents',['as'=>'getEvents','uses'=>'PagesController@getCalendar']);
Route::get('/DayEvents',['as'=>'getDayEvents','uses'=>'PagesController@dayEvents']);

Route::get('/Event/{name}',['as'=>'viewEvent','uses'=>'PagesController@event']);

Route::get('/gallery',['as'=>'viewGallery','uses'=>'PagesController@gallery']);
Route::post('/teamInfo',['as'=>'TeamInfo', 'uses'=>'RegisterController@teamInfo']);
Route::post('/coachInfo',['as'=>'CoachInfo', 'uses'=>'RegisterController@teamCoach']);
Route::post('/managerInfo',['as'=>'ManagerInfo', 'uses'=>'RegisterController@teamManager']);
Route::post('/PlayerInfo',['as'=>'PlayerInfo', 'uses'=>'RegisterController@player']);
Route::post('/PageNotFound',['as'=>'notFound', 'uses'=>'pagesController@notFound']);


Route::get('/teams',['as'=>'viewTeams', 'uses'=>'PagesController@teams']);
Route::get('/teams/{name}',['as'=>'seeTeam', 'uses'=>'PagesController@teamInfo']);
Route::get('/teams/{name}/players',['as'=>'viewPlayers', 'uses'=>'PagesController@players']);
Route::get('/team/players/{id}',['as'=>'viewPlayer', 'uses'=>'PagesController@player']);


Route::get('/team/Register',['as'=>'register','uses'=>'PagesController@register']);
Route::post('/team/Register',['as'=>'register','uses'=>'RegisterController@teamInfo']);
Route::post('/RegistrationComplete',['as'=>'teamCompleted','uses'=>'RegisterController@teamComplete']);
Route::get('/RegistrationComplete',['as'=>'teamCompleted','uses'=>'RegisterController@teamComplete']);


Route::get('/masterLogin',['as'=>'MasterLogin','uses'=>'Admin\loginController@tryLogin']);//login
Route::get('/admin',['as'=>'MasterLogin','uses'=>'Admin\loginController@tryLogin']);//login
Route::post('/masterLogin',['as'=>'MasterLogin','uses'=>'Admin\loginController@postLogin']);//login

Route::group(['middleware'=>'master','prefix'=>'admin'],function(){

    Route::get('/dashboard',['as'=>'adminDashboard','uses'=>'Admin\pagesController@home']);
    Route::get('/Logout',['as'=>'signOut','uses'=>'Admin\loginController@logout']);
    //events
    Route::get('/addEvent',['as'=>'createEvent','uses'=>'Admin\eventPagesController@create']);//create events
    Route::post('/addEvent',['as'=>'createEvent','uses'=>'Admin\eventPagesController@store']);//create events
    Route::get('/event/{title}',['as'=>'showEvent','uses'=>'Admin\eventPagesController@show']);//view
    Route::post('/event/{title}',['as'=>'showEvent','uses'=>'Admin\eventPagesController@updateStatus']);//view
    Route::get('/events',['as'=>'Events','uses'=>'Admin\eventPagesController@index']);//view
    Route::get('/deleteEvents/{slug}',['as'=>'deleteEvent','uses'=>'Admin\eventPagesController@destroy']);//view
    Route::get('/editEvent/{slug}',['as'=>'editEvent','uses'=>'Admin\eventPagesController@edit']);//view
    Route::post('/editEvent/{slug}',['as'=>'editEvent','uses'=>'Admin\eventPagesController@update']);//view

    //teams
    Route::get('/Teams',['as'=>'allTeams','uses'=>'Admin\teamPagesController@index']);
    Route::get('/Teams/{team?}',['as'=>'viewTeam','uses'=>'Admin\teamPagesController@show']);
    Route::get('/CreateTeam',['as'=>'addTeam','uses'=>'Admin\teamPagesController@create']);
    Route::post('/CreateTeam',['as'=>'addTeam','uses'=>'Admin\teamPagesController@store']);
    Route::get('/Teams/delete/{team}',['as'=>'deleteTeam','uses'=>'Admin\teamPagesController@destroy']);
    Route::get('/Teams/edit/{team}',['as'=>'editTeam','uses'=>'Admin\teamPagesController@edit']);
    Route::post('/Teams/edit/{team}',['as'=>'editTeam','uses'=>'Admin\teamPagesController@update']);

    //players
    Route::get('/Teams/{team}/players',['as'=>'seePlayers','uses'=>'Admin\playerPagesController@index']);
    Route::get('/Teams/{team}/player/{name}',['as'=>'seePlayer','uses'=>'Admin\playersPagesController@show']);
    Route::get('/Teams/{team}/removePlayer/{name}',['as'=>'deletePlayer','uses'=>'Admin\playersPagesController@destroy']);
    Route::get('/Teams/{team}/editPlayer/{name}',['as'=>'editPlayer','uses'=>'Admin\playersPagesController@edit']);
    Route::post('/Teams/{team}/editPlayer/{name}',['as'=>'editPlayer','uses'=>'Admin\playersPagesController@update']);
    Route::post('/Teams/Addplayers',['as'=>'addPlayers','uses'=>'Admin\playersPagesController@store']);

    //staff
    Route::post('/Teams/AddStaff',['as'=>'addStaff','uses'=>'Admin\staffPagesController@store']);
    Route::get('/Teams/{team}/staff/{position}',['as'=>'seeStaff','uses'=>'Admin\staffPagesController@show']);
    Route::get('/Teams/{team}/removeStaff/{name}',['as'=>'deleteStaff','uses'=>'Admin\staffPagesController@destroy']);
    Route::get('/Teams/{team}/editStaff/{name}',['as'=>'editStaff','uses'=>'Admin\staffPagesController@edit']);
    Route::post('/Teams/{team}/editStaff/{name}',['as'=>'editStaff','uses'=>'Admin\staffPagesController@update']);

    //others
    Route::get('UpdateStatus',['as'=>'upStatus','uses'=>'Admin\teamPagesController@teamStatus']);
});

//team profile routes
//Route::get('/profile',['as'=>'teamSignIn'])
Route::get('/team/signIn',['as'=>'teamSignIn','uses'=>'team\teamLoginController@teamLogin']);
Route::post('/team/signIn',['as'=>'teamSignIn','uses'=>'team\teamLoginController@teamTryLogin']);

 Route::group(['middleware'=>'team','prefix'=>'teamAdmin'],function(){
     Route::get('/dashboard',['as'=>'teamDashboard','uses'=>'team\teamPagesController@overview']);
     Route::get('/Logout',['as'=>'teamSignOut','uses'=>'team\teamLoginController@logout']);


     Route::get('/players',['as'=>'teamPlayers','uses'=>'team\teamPagesController@index']);
     Route::post('/newPlayer',['as'=>'newPlayers','uses'=>'team\teamPagesController@store']);
     Route::get('teamPlayer/{id}',['as'=>'showPlayer','uses'=>'team\teamPagesController@show']);
     Route::get('teamUpdatePlayer/{id}',['as'=>'updatePlayer','uses'=>'team\teamPagesController@edit']);
     Route::post('teamUpdatePlayer/{id}',['as'=>'updatePlayer','uses'=>'team\teamPagesController@update']);
     Route::get('teamDeletePlayer/{id}',['as'=>'removePlayer','uses'=>'team\teamPagesController@destroy']);
     Route::get('teamOverview',['as'=>'overview','uses'=>'team\teamPagesController@overview']);

     //
     Route::get('editTeam',['as'=>'teamUpdate','uses'=>'team\teamPagesController@teamUpdate']);
     Route::post('editTeam',['as'=>'teamUpdate','uses'=>'team\teamPagesController@teamEdit']);
     //staff
     Route::post('createStaff',['as'=>'newStaff','uses'=>'team\teamStaffPagesController@store']);
     Route::get('updateStaff/{id}',['as'=>'upStaff','uses'=>'team\teamStaffPagesController@edit']);
     Route::post('updateStaff/{id}',['as'=>'upStaff','uses'=>'team\teamStaffPagesController@update']);
     Route::get('showStaff/{id}',['as'=>'viewStaff','uses'=>'team\teamStaffPagesController@show']);
     Route::get('removeStaff/{id}',['as'=>'downStaff','uses'=>'team\teamStaffPagesController@destroy']);



     //change password
     Route::get('/updatePassword',['as'=>'changePassword','uses'=>'team\teamLoginController@editPassword']);
     Route::post('/updatePassword',['as'=>'changePassword','uses'=>'team\teamLoginController@updatePassword']);

     //others
     Route::get('/teamReview',['as'=>'tmReview','uses'=>'team\teamPagesController@teamReview']);
 });

Route::get('Email', function(){
    Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
    {
        $message->subject('Mailgun and Laravel are awesome!');
        $message->from('volleyball.ng@no_reply', 'Website Name');
        $message->to('kulblog66@gmail.com');
    });
});

//event organizer admin area
Route::get('/organizer/Login',['as'=>'organizerLogin','uses'=>'Organizer\organizerLoginController@organizerlogin']);
Route::post('/organizer/Login',['as'=>'organizerLogin','uses'=>'Organizer\organizerLoginController@tryLogin']);
Route::group(['middleware'=>'organizer','prefix'=>'organizer'],function(){

    Route::get('/dashboard',['as'=>'organizerDashboard','uses'=>'Organizer\organizerPagesController@dashboard']);
    Route::get('/logout',['as'=>'oLogout','uses'=>'Organizer\organizerLoginController@logout']);
});



