<?php

use App\Livewire\Backend\Faq\Faq;
use App\Livewire\Backend\Dashboard;
use App\Livewire\Backend\News\News;
use App\Livewire\Backend\Team\Team;
use App\Livewire\Backend\Role\Roles;
use App\Livewire\Backend\User\Users;
use App\Livewire\Backend\About\About;
use App\Livewire\Backend\Faq\EditFaq;
use App\Livewire\Backend\Squad\Squad;
use Illuminate\Support\Facades\Route;
use App\Livewire\Backend\Faq\CreateFaq;
use App\Livewire\Backend\News\EditNews;
use App\Livewire\Backend\Player\Player;
use App\Livewire\Backend\Role\EditRole;
use App\Livewire\Backend\Slider\Slider;
use App\Livewire\Backend\Team\EditTeam;
use App\Livewire\Backend\Location\Thana;
use App\Livewire\Backend\About\EditAbout;
use App\Livewire\Backend\Contact\Contact;
use App\Livewire\Backend\Match\EditMatch;
use App\Livewire\Backend\Match\MatchList;
use App\Livewire\Backend\News\CreateNews;
use App\Livewire\Backend\Profile\Profile;
use App\Livewire\Backend\Role\CreateRole;
use App\Livewire\Backend\Sponsor\Sponsor;
use App\Livewire\Backend\Squad\EditSquad;
use App\Livewire\Backend\Team\CreateTeam;
use App\Livewire\Backend\About\CreateAbout;
use App\Livewire\Backend\Category\Category;
use App\Livewire\Backend\Location\District;
use App\Livewire\Backend\Match\CreateMatch;
use App\Livewire\Backend\Player\EditPlayer;
use App\Livewire\Backend\RoleIcon\RoleIcon;
use App\Livewire\Backend\Settings\Settings;
use App\Livewire\Backend\Slider\EditSlider;
use App\Livewire\Backend\Squad\CreateSquad;
use App\Livewire\Backend\Player\CreatePlayer;
use App\Livewire\Backend\Slider\CreateSlider;
use App\Livewire\Backend\Sponsor\EditSponsor;
use App\Livewire\Backend\Contact\ContactDetail;
use App\Livewire\Backend\Gallery\Photo\CreatePhoto;
use App\Livewire\Backend\Gallery\Photo\EditPhoto;
use App\Livewire\Backend\Gallery\Photo\Photo;
use App\Livewire\Backend\Gallery\Video\Video;
use App\Livewire\Backend\Scoreboard\Scoreboard;
use App\Livewire\Backend\Settings\EditSettings;
use App\Livewire\Backend\Sponsor\CreateSponsor;
use App\Livewire\Backend\Tournament\Tournament;
use App\Livewire\Backend\Permission\Permissions;
use App\Livewire\Backend\Scoreboard\MatchResult;
use App\Livewire\Backend\Settings\CreateSettings;
use App\Livewire\Backend\Scoreboard\EditScoreboard;
use App\Livewire\Backend\Tournament\EditTournament;
use App\Livewire\Backend\Register\RegisterPlayerList;
use App\Livewire\Backend\Scoreboard\CreateScoreboard;
use App\Livewire\Backend\Tournament\CreateTournament;
use App\Livewire\Backend\Register\ViewRegisterPlayerDetail;


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // Category
    Route::get('/categories', Category::class)->name('category');

    // Profile
    Route::get('/profile', Profile::class)->name('profile');

    // Role Routes
    Route::get('/roles', Roles::class)->name('role');
    Route::get('/create-role', CreateRole::class)->name('create.role');
    Route::get('/role/{roleId}/edit', EditRole::class)->name('edit.role');

    // Permission Route
    Route::get('/permissions', Permissions::class)->name('permission');

    // User Routes
    Route::get('/users', Users::class)->name('user');

    // Faq Routes
    Route::get('/faq', Faq::class)->name('faq');
    Route::get('/create-faq', CreateFaq::class)->name('create.faq');
    Route::get('/faq/{faqId}/edit', EditFaq::class)->name('edit.faq');

    // News Routes
    Route::get('/news-list', News::class)->name('news');
    Route::get('/create-news', CreateNews::class)->name('create.news');
    Route::get('/news/{newsId}/edit', EditNews::class)->name('edit.news');

    // Player Routes
    Route::get('/players', Player::class)->name('player');
    Route::get('/create-player', CreatePlayer::class)->name('create.player');
    Route::get('/player/{playerId}/edit', EditPlayer::class)->name('edit.player');

    // Team Routes
    Route::get('/teams', Team::class)->name('team');
    Route::get('/create-team', CreateTeam::class)->name('create.team');
    Route::get('/team/{teamId}/edit', EditTeam::class)->name('edit.team');

    // Tournament Routes
    Route::get('/tournaments', Tournament::class)->name('tournament');
    Route::get('/create-tournament', CreateTournament::class)->name('create.tournament');
    Route::get('/tournament/{tournamentId}/edit', EditTournament::class)->name('edit.tournament');

    // Match Routes
    Route::get('/matches', MatchList::class)->name('match');
    Route::get('/create-match', CreateMatch::class)->name('create.match');
    Route::get('/match/{matchId}/edit', EditMatch::class)->name('edit.match');

    // Squad Routes
    Route::get('/squad', Squad::class)->name('squad');
    Route::get('/create-squad', CreateSquad::class)->name('create.squad');
    Route::get('squad/{squadId}/edit', EditSquad::class)->name('edit.squad');

    // Scoreboard Routes
    Route::get('/score', Scoreboard::class)->name('score');
    Route::get('/create-score', CreateScoreboard::class)->name('create.score');
    Route::get('/score/{scoreId}/team/{teamId}/edit', EditScoreboard::class)->name('edit.score');
    Route::get('/match/{matchId}/result', MatchResult::class)->name('match.result');

    // Be a Player Routes
    Route::get('/register-player', RegisterPlayerList::class)->name('register-player');
    Route::get('/register/{regId}/view', ViewRegisterPlayerDetail::class)->name('view.register-player');

    // About Routes
    Route::get('/about', About::class)->name('about');
    Route::get('/create-about', CreateAbout::class)->name('create.about');
    Route::get('/about/{aboutId}/edit', EditAbout::class)->name('edit.about');

    // Gallery Routes
    // Route::get('/gallery', Gallery::class)->name('gallery');

    // Location Routes
    Route::get('/district', District::class)->name('district');
    Route::get('/thana', Thana::class)->name('thana');


    // Contact Routes
    Route::get('/contacts', Contact::class)->name('contact');
    Route::get('/contact/{contactId}/detail', ContactDetail::class)->name('view.contact');

    // Sponsors Routes
    Route::get('/sponsors', Sponsor::class)->name('sponsor');
    Route::get('/create-sponsor', CreateSponsor::class)->name('create.sponsor');
    Route::get('/sponsor/{sponsorId}/edit', EditSponsor::class)->name('edit.sponsor');

    // Gallery Routes
    Route::get('/gallery', Photo::class)->name('gallery');
    Route::get('/create-gallery', CreatePhoto::class)->name('create.gallery');
    Route::get('/gallery/{galleryId}/edit', EditPhoto::class)->name('edit.gallery');

    // Video Route
    Route::get('/video', Video::class)->name('video');

    // Slider Routes
    Route::get('/sliders', Slider::class)->name('slider');
    Route::get('/create-slider', CreateSlider::class)->name('create.slider');
    Route::get('/slider/{sliderId}/edit', EditSlider::class)->name('edit.slider');

    // Role Icon Route
    Route::get('/role-icon', RoleIcon::class)->name('role.icon');

    // Settings
    Route::get('/settings', Settings::class)->name('settings');
    Route::get('/create-settings', CreateSettings::class)->name('create.settings');
    Route::get('/settings/{settingId}/edit', EditSettings::class)->name('edit.settings');
});

Route::get('locale/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'bn'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name('locale.switch');



require __DIR__ . '/auth.php';
// require __DIR__ . '/backend.php';
require __DIR__ . '/frontend.php';
