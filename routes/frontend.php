<?php

use App\Livewire\Frontend\About\About;
use App\Livewire\Frontend\Contact\Contact;
use App\Livewire\Frontend\Fixture\Fixture;
use App\Livewire\Frontend\Gallery\PhotoGallery;
use App\Livewire\Frontend\Gallery\VideoGallery;
use App\Livewire\Frontend\Home\HomePage;
use App\Livewire\Frontend\News\News;
use App\Livewire\Frontend\News\NewsDetail;
use App\Livewire\Frontend\Player\Player;
use App\Livewire\Frontend\Profile\Profile;
use App\Livewire\Frontend\Record\Records;
use App\Livewire\Frontend\Registration\Registration;
use App\Livewire\Frontend\ScoreBoard\ScoreBoard;
use App\Livewire\Frontend\Team\Team;
use App\Livewire\Frontend\Team\TeamProfile;
use Illuminate\Support\Facades\Route;

Route::middleware('visitor')->as('frontend.')->group(function () {
    Route::get('/', HomePage::class)->name('home-page');
    Route::get('/match/{matchId}/{team1}/vs/{team2}', ScoreBoard::class)->name('scoreboard');
    Route::get('/profile/{slug?}', Profile::class)->name('profile');
    Route::get('/photo-gallery', PhotoGallery::class)->name('photo.gallery');
    Route::get('/video-gallery', VideoGallery::class)->name('video.gallery');
    Route::get('/records', Records::class)->name('records');
    Route::get('/news', News::class)->name('news');
    Route::get('/news/{slug}', NewsDetail::class)->name('news.detail');
    Route::get('/fixtures', Fixture::class)->name('fixture');
    Route::get('/player', Player::class)->name('player');
    Route::get('/teams', Team::class)->name('teams');
    Route::get('/team/{slug?}', TeamProfile::class)->name('team');
    Route::get('/player-registration', Registration::class)->name('player-registration');
    Route::get('/about-us', About::class)->name('about');
    Route::get('/contact-us', Contact::class)->name('contact-us');
});
