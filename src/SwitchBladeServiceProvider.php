<?php namespace AwkwardIdeas\SwitchBlade;

use Illuminate\Support\ServiceProvider;

class SwitchBladeServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/switchblade.php';

        $this->publishes([$configPath => $this->getConfigPath()], 'config');

        Directive::AddCustomDirectives();


    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Get argument array from argument string.
     *
     * @param string $argumentString
     *
     * @return array
     */
    private function getArguments($argumentString)
    {
        return explode(', ', str_replace(['(', ')'], '', $argumentString));
    }

    private function getConfigPath()
    {
        return config_path('switchblade.php');
    }

}