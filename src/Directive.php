<?php
namespace AwkwardIdeas\SwitchBlade;

use Illuminate\Support\Facades\Blade;

class Directive{
    public static function AddCustomDirectives()
    {
        Blade::directive('htmlAttribute', function ($expression) {
            //begin with [A-Za-z]
            //allowed after first [A-Za-z][0-9]-_:.
            return "<?php echo preg_replace('/[^a-z\d]/i', '', {$expression}); ?>";
        });

        /*
         * Laravel dd() function.
         *
         * Usage: @dd($variableToDump)
         */
        Blade::directive('dd', function ($expression) {
            return "<?php dd($expression); ?>";
        });

        /*
         * php explode() function.
         *
         * Usage: @explode($delimiter, $string)
         */
        Blade::directive('explode', function ($expression) {
            list($delimiter, $string) = explode(',',str_replace(['(',')',' '], '', $expression));
            return "<?php echo explode({$delimiter}, {$string}); ?>";
        });

        /*
         * php implode() function.
         *
         * Usage: @implode($delimiter, $array)
         */
        Blade::directive('implode', function ($expression) {
            list($delimiter, $array) = explode(',',str_replace(['(',')',' '], '', $expression));
            return "<?php echo implode({$delimiter}, {$array}); ?>";
        });

        /*
         * php var_dump() function.
         *
         * Usage: @var_dump($variableToDump)
         */
        Blade::directive('varDump', function ($expression) {
            return "<?php var_dump(with{$expression}); ?>";
        });

        /*
         * Set variable.
         *
         * Usage: @set($name, value)
         */
        Blade::directive('set', function ($expression) {
            list($name, $value) = explode(',',str_replace(['(',')',' '], '', $expression));
            return "<?php {$name} = {$value}; ?>";
        });

        /*
         * Get Environtment variable.
         *
         * Usage: @getenv($name)
         */
        Blade::directive('getenv', function ($expression) {

            return "<?php echo getenv($expression); ?>";
        });
    }
}
