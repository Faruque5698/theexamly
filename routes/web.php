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
Route::get('/livetable', 'LiveTable@index');
Route::get('/livetable/fetch_data', 'LiveTable@fetch_data')->name('livetable.fetch_data');
Route::post('/livetable/add_data', 'LiveTable@add_data')->name('livetable.add_data');
Route::post('/livetable/update_data', 'LiveTable@update_data')->name('livetable.update_data');
Route::post('/livetable/delete_data', 'LiveTable@delete_data')->name('livetable.delete_data');
Auth::routes();

Route::group(['namespace' => 'Backend\User'], function () {
Route::get('/admin/profile', 'UserController@profileEdit');
Route::post('/admin/profile', 'UserController@profileUpdate')->name('update.profile');
Route::get('/admin/profileImage', 'UserController@profileImage');
Route::post('/admin/profileImage', 'UserController@update_avatar')->name('update.image');
});


/*========================= just todo Admin Basic Template =============================*/
Route::get('/dashboard', function () {
    // return view('dashboard');
     return redirect()->route('admin.dashboard');
});

// Route::get('/','DashboardController@index');

Route::get('widgets', function () {
    return view('pages.widgets.widget');
});

Route::group(['prefix' => 'apps'], function () {
    Route::get('kanban-board', function () {
        return view('pages.apps.kanban-board');
    });
    Route::get('todo-list', function () {
        return view('pages.apps.todo-list');
    });
    Route::get('tickets', function () {
        return view('pages.apps.tickets');
    });
    Route::get('chats', function () {
        return view('pages.apps.chats');
    });
    Route::get('email', function () {
        return view('pages.apps.email');
    });
    Route::get('calendar', function () {
        return view('pages.apps.calendar');
    });
    Route::get('gallery', function () {
        return view('pages.apps.gallery');
    });
});

Route::group(['prefix' => 'basic-ui'], function () {
    Route::get('accordions', function () {
        return view('pages.basic-ui.accordions');
    });
    Route::get('buttons', function () {
        return view('pages.basic-ui.buttons');
    });
    Route::get('badges', function () {
        return view('pages.basic-ui.badges');
    });
    Route::get('breadcrumbs', function () {
        return view('pages.basic-ui.breadcrumbs');
    });
    Route::get('dropdowns', function () {
        return view('pages.basic-ui.dropdowns');
    });
    Route::get('modals', function () {
        return view('pages.basic-ui.modals');
    });
    Route::get('progress-bar', function () {
        return view('pages.basic-ui.progress-bar');
    });
    Route::get('pagination', function () {
        return view('pages.basic-ui.pagination');
    });
    Route::get('tabs', function () {
        return view('pages.basic-ui.tabs');
    });
    Route::get('typography', function () {
        return view('pages.basic-ui.typography');
    });
    Route::get('tooltips', function () {
        return view('pages.basic-ui.tooltips');
    });
});

Route::group(['prefix' => 'basic-ui'], function () {
    Route::get('accordions', function () {
        return view('pages.basic-ui.accordions');
    });
    Route::get('buttons', function () {
        return view('pages.basic-ui.buttons');
    });
    Route::get('badges', function () {
        return view('pages.basic-ui.badges');
    });
    Route::get('breadcrumbs', function () {
        return view('pages.basic-ui.breadcrumbs');
    });
    Route::get('dropdowns', function () {
        return view('pages.basic-ui.dropdowns');
    });
    Route::get('modals', function () {
        return view('pages.basic-ui.modals');
    });
    Route::get('progress-bar', function () {
        return view('pages.basic-ui.progress-bar');
    });
    Route::get('pagination', function () {
        return view('pages.basic-ui.pagination');
    });
    Route::get('tabs', function () {
        return view('pages.basic-ui.tabs');
    });
    Route::get('typography', function () {
        return view('pages.basic-ui.typography');
    });
    Route::get('tooltips', function () {
        return view('pages.basic-ui.tooltips');
    });
});

Route::group(['prefix' => 'advanced-ui'], function () {
    Route::get('dragula', function () {
        return view('pages.advanced-ui.dragula');
    });
    Route::get('clipboard', function () {
        return view('pages.advanced-ui.clipboard');
    });
    Route::get('context-menu', function () {
        return view('pages.advanced-ui.context-menu');
    });
    Route::get('popups', function () {
        return view('pages.advanced-ui.popups');
    });
    Route::get('sliders', function () {
        return view('pages.advanced-ui.sliders');
    });
    Route::get('carousel', function () {
        return view('pages.advanced-ui.carousel');
    });
    Route::get('loaders', function () {
        return view('pages.advanced-ui.loaders');
    });
    Route::get('tree-view', function () {
        return view('pages.advanced-ui.tree-view');
    });
});

Route::group(['prefix' => 'forms'], function () {
    Route::get('basic-elements', function () {
        return view('pages.forms.basic-elements');
    });
    Route::get('advanced-elements', function () {
        return view('pages.forms.advanced-elements');
    });
    Route::get('dropify', function () {
        return view('pages.forms.dropify');
    });
    Route::get('form-validation', function () {
        return view('pages.forms.form-validation');
    });
    Route::get('step-wizard', function () {
        return view('pages.forms.step-wizard');
    });
    Route::get('wizard', function () {
        return view('pages.forms.wizard');
    });
});

Route::group(['prefix' => 'editors'], function () {
    Route::get('text-editor', function () {
        return view('pages.editors.text-editor');
    });
    Route::get('code-editor', function () {
        return view('pages.editors.code-editor');
    });
});

Route::group(['prefix' => 'charts'], function () {
    Route::get('chartjs', function () {
        return view('pages.charts.chartjs');
    });
    Route::get('morris', function () {
        return view('pages.charts.morris');
    });
    Route::get('flot', function () {
        return view('pages.charts.flot');
    });
    Route::get('google-charts', function () {
        return view('pages.charts.google-charts');
    });
    Route::get('sparklinejs', function () {
        return view('pages.charts.sparklinejs');
    });
    Route::get('c3-charts', function () {
        return view('pages.charts.c3-charts');
    });
    Route::get('chartist', function () {
        return view('pages.charts.chartist');
    });
    Route::get('justgage', function () {
        return view('pages.charts.justgage');
    });
});

Route::group(['prefix' => 'tables'], function () {
    Route::get('basic-table', function () {
        return view('pages.tables.basic-table');
    });
    Route::get('data-table', function () {
        return view('pages.tables.data-table');
    });
    Route::get('js-grid', function () {
        return view('pages.tables.js-grid');
    });
    Route::get('sortable-table', function () {
        return view('pages.tables.sortable-table');
    });
});

Route::get('notifications', function () {
    return view('pages.notifications.index');
});

Route::group(['prefix' => 'icons'], function () {
    Route::get('material', function () {
        return view('pages.icons.material');
    });
    Route::get('flag-icons', function () {
        return view('pages.icons.flag-icons');
    });
    Route::get('font-awesome', function () {
        return view('pages.icons.font-awesome');
    });
    Route::get('simple-line-icons', function () {
        return view('pages.icons.simple-line-icons');
    });
    Route::get('themify', function () {
        return view('pages.icons.themify');
    });
});

Route::group(['prefix' => 'maps'], function () {
    Route::get('vector-map', function () {
        return view('pages.maps.vector-map');
    });
    Route::get('mapael', function () {
        return view('pages.maps.mapael');
    });
    Route::get('google-maps', function () {
        return view('pages.maps.google-maps');
    });
});

Route::group(['prefix' => 'user-pages'], function () {
    Route::get('login', function () {
        return view('pages.user-pages.login');
    });
    Route::get('login-2', function () {
        return view('pages.user-pages.login-2');
    });
    Route::get('multi-step-login', function () {
        return view('pages.user-pages.multi-step-login');
    });
    Route::get('register', function () {
        return view('pages.user-pages.register');
    });
    Route::get('register-2', function () {
        return view('pages.user-pages.register-2');
    });
    Route::get('lock-screen', function () {
        return view('pages.user-pages.lock-screen');
    });
});

Route::group(['prefix' => 'error-pages'], function () {
    Route::get('error-404', function () {
        return view('pages.error-pages.error-404');
    });
    Route::get('error-500', function () {
        return view('pages.error-pages.error-500');
    });
});

Route::group(['prefix' => 'general-pages'], function () {
    Route::get('blank-page', function () {
        return view('pages.general-pages.blank-page');
    });
    Route::get('profile', function () {
        return view('pages.general-pages.profile');
    });
    Route::get('faq', function () {
        return view('pages.general-pages.faq');
    });
    Route::get('faq-2', function () {
        return view('pages.general-pages.faq-2');
    });
    Route::get('news-grid', function () {
        return view('pages.general-pages.news-grid');
    });
    Route::get('timeline', function () {
        return view('pages.general-pages.timeline');
    });
    Route::get('search-results', function () {
        return view('pages.general-pages.search-results');
    });
    Route::get('portfolio', function () {
        return view('pages.general-pages.portfolio');
    });
    Route::get('user-listing', function () {
        return view('pages.general-pages.user-listing');
    });
});

Route::group(['prefix' => 'ecommerce'], function () {
    Route::get('invoice', function () {
        return view('pages.ecommerce.invoice');
    });
    Route::get('invoice-2', function () {
        return view('pages.ecommerce.invoice-2');
    });
    Route::get('pricing', function () {
        return view('pages.ecommerce.pricing');
    });
    Route::get('product-catalogue', function () {
        return view('pages.ecommerce.product-catalogue');
    });
    Route::get('project-list', function () {
        return view('pages.ecommerce.project-list');
    });
    Route::get('orders', function () {
        return view('pages.ecommerce.orders');
    });
});

/*========================= end just-todo Admin Basic Template =============================*/

/*================================this for faster development process=======================*/
// For Clear cache
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/clear-view', function () {
    Artisan::call('view:clear');
    return "view is cleared";
});

Route::get('/clear-route', function () {
    Artisan::call('route:clear');
    return "Route is cleared";
});

Route::get('/clear-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "cache,view and route is cleared";
});
/*================================this for faster development process=======================*/

// 404 for undefined routes
//Route::any('/{page?}', function () {
//    return View::make('pages.error-pages.error-404');
//})->where('page', '.*');
