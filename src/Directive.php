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
         * Usage: @explode($delimiter, $string, $index)
         */
        Blade::directive('explode', function ($expression) {
            list($delimiter, $string, $index) = self::GetArguments($expression);
            return "<?php echo explode({$delimiter}, {$string})[$index]; ?>";
        });

        /*
         * php implode() function.
         *
         * Usage: @implode($delimiter, $array)
         */
        Blade::directive('implode', function ($expression) {
            list($delimiter, $array) = self::GetArguments($expression);
            return "<?php echo implode({$delimiter}, {$array}); ?>";
        });

        /*
         * php var_dump() function.
         *
         * Usage: @var_dump($variableToDump)
         */
        Blade::directive('varDump', function ($expression) {
            return "<?php var_dump($expression); ?>";
        });

        /*
         * Set variable.
         *
         * Usage: @set($name, value)
         */
        Blade::directive('set', function ($expression) {
            list($name, $value) = self::GetArguments($expression);
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

        /*
         *  Perform a switch statement
         *
         *  Usage: @switch($expression, 'foo')
         *              <span>stuff</span>
         *          @endcase
         *          @defaultcase
         *              <span>default stuff</span>
         *          @endswitch
         */
        Blade::directive('switch', function($expression) {
            $args = self::GetArguments($expression);
            if(count($args) == 2){
                return "<?php switch($args[0]):" . PHP_EOL . "case $args[1]: ?>";
            }else{
                $switchExpression = array_shift($args);
                $switch = "<?php switch($switchExpression):".PHP_EOL;
                foreach($args as $arg){
                    $switch .= "case $arg:" . PHP_EOL;
                }
                $switch .= "?>";
                return $switch;
            }

        });

        Blade::directive('endswitch', function($expression) {
            return "<?php endswitch; ?>";
        });

        Blade::directive('case', function($expression){
            $args = self::GetArguments($expression);
            if(count($args)==1){
                return "<?php case $expression: ?>";
            }else{
                $cases = "<?php ";
                foreach($args as $arg){
                    $cases .= "case $arg:" . PHP_EOL;
                }
                $cases .= "?>";
                return $cases;
            }
        });

        Blade::directive('endcase', function($expression){
            return "<?php break; ?>";
        });

        Blade::directive('defaultcase', function($expression){
            return "<?php default: ?>";
        });

        // Add @continue for Loops
        Blade::directive('continue', function($expression)
        {
            return '<?php continue; ?>';
        });

        // Add @break for Loops
        Blade::directive('break', function($expression)
        {
            return '<?php break; ?>';
        });

        // Add @ifempty for Loops
        Blade::directive('ifempty', function($expression)
        {
            return "<?php if(count($expression) == 0): ?>";
        });

        // Add @endifempty for Loops
        Blade::directive('endifempty', function($expression)
        {
            return '<?php endif; ?>';
        });

        // Add @optional for Complex Yielding
        Blade::directive('optional', function($expression)
        {
            return "<?php if(trim(\$__env->yieldContent({$expression}))): ?>";
        });

        // Add @endoptional for Complex Yielding
        Blade::directive('endoptional', function($expression)
        {
            return "<?php endif; ?>";
        });

        Blade::directive('increment', function($expression){
            return "<?php {$expression}++; ?>";
        });

        Blade::directive('decrement', function($expression){
            return "<?php {$expression}--; ?>";
        });

        Blade::directive('iffileexists', function($expression){
            return "<?php if(file_exists({$expression})): ?>";
        });

        Blade::directive('endiffileexists', function($expression){
            return "<?php endif; ?>";
        });

        Blade::directive('hascount', function($expression){
            return "<?php if({$expression}->count() > 0): ?>";
        });

        Blade::directive('endhascount', function($expression){
            return "<?php endif; ?>";
        });

        Blade::directive('isnull', function($expression){
            return "<?php if(is_null({$expression})): ?>";
        });

        Blade::directive('endisnull', function($expression){
            return "<?php endif; ?>";
        });

        Blade::directive('notnull', function($expression){
            return "<?php if(!is_null({$expression})): ?>";
        });

        Blade::directive('endnotnull', function($expression){
            return "<?php endif; ?>";
        });

        Blade::directive('lang', function($expression){
            $args = self::GetArguments($expression);
            $key = $args[0];
            $replace = (array_key_exists(1,$args)) ? $args[1] : "[]";
            $locale =  (array_key_exists(2,$args)) ? $args[2] : "'en'";
            return "<?php echo app('translator')->choice({$key}, 1, {$replace}, {$locale}); ?>";
        });
    }
    public static function GetArguments($expression){
        return explode(',', $expression);
    }
}
