<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Blade;
use App\StudentClass;
use App\Comment;
use App\Feedback;
use App\Setting;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('settings', Setting::first());
        View::share('settings',  function() {
            $settings = Setting::first();
            return $settings;
        });    
        //Schema::defaultStringLength(191);
        View::share('thisYear', date('Y', time()));
        
        View::share('roleNames', [1 => 'Администратор', 'Глава комитета', 'Участник комитета', 'Зарегестрированный пользователь']);
        
        View::share('transition', ceil((strtotime('now') -
                strtotime(date('Y',strtotime('now')).'-08-01'))/(60*60*24*365)));
        
        View::share('classesNumbers', function() {
            $classes = StudentClass::get();
            $data = [];
            $transition = ceil((strtotime('now') -
                    strtotime(date('Y',strtotime('now')).'-08-01'))/(60*60*24*365));
            foreach ($classes as $key => $class) {
                if (date('Y') - $class->start_year + $transition < 4) {
                    $data[$class->id] = date('Y') - $class->start_year + $transition;
                } elseif (date('Y') <= $class->year_of_issue) {
                    $data[$class->id] = date('Y') - $class->start_year + $transition + 1 - $class->fourth_class;
                } else {
                    $data[$class->id] = '(Выпустился в '.$class->year_of_issue.')'.($class->year_of_issue - $class->start_year + 1 - $class->fourth_class);
                }
            }
            $data[null] = '';
            return $data; 
        });
        
        View::share('unpublishedCommentsCount', function() {
            $unpublishedCommentsCount = Comment::where('ispublished', '=', 0)->count();
            return $unpublishedCommentsCount;
        });
        
        View::share('notViewedFeedbacks', function() {
            $notViewedFeedbacks = Feedback::where('status', '=', 1)->count();
            return $notViewedFeedbacks;
        });
        View::share('monthNames',
            [1 => 'Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября',
                'Ноября', 'Декабря']);
        View::share('endingOfAge', function($n) {
            $titles = ['год', 'года', 'лет'];
            $cases = array(2, 0, 1, 1, 1, 2);
            return $titles[($n % 100 > 4 && $n % 100 < 20) ? 2 : $cases[min($n % 10, 5)]];
        });
				
				
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}