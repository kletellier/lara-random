<?php 

namespace Kletellier\Random;

use Illuminate\Support\ServiceProvider;

class RandomServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/random.php' => config_path('random.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/random.php', 'random');
        $this->app->singleton('random' , function($app) {

            $rnd_factory = new \RandomLib\Factory();
            $strength = $app["config"]->get('random.strength');
            $ret = $rnd_factory->getLowStrengthGenerator();
            switch ($strength) {
                case 'high':
                    $ret = $rnd_factory->getHighStrengthGenerator();
                    break;
                case 'medium':
                    $ret = $rnd_factory->getMediumStrengthGenerator();
                    break;
                default:
                    $ret = $rnd_factory->getLowStrengthGenerator();
                    break;
            }
            return $ret;
        });
    }

    public function provides()
    {
        return ['random'];
    }
}