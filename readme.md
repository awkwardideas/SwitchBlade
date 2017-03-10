# SwitchBlade: Custom Directives for the Laravel Blade templating engine

[![Latest Stable Version](https://poser.pugx.org/awkwardideas/switchblade/v/stable)](https://packagist.org/packages/awkwardideas/switchblade)
[![Total Downloads](https://poser.pugx.org/awkwardideas/switchblade/downloads)](https://packagist.org/packages/awkwardideas/switchblade)
[![Latest Unstable Version](https://poser.pugx.org/awkwardideas/switchblade/v/unstable)](https://packagist.org/packages/awkwardideas/switchblade)
[![License](https://poser.pugx.org/awkwardideas/switchblade/license)](https://packagist.org/packages/awkwardideas/switchblade)

## Install Via Composer

```bash
$ composer require awkwardideas/switchblade
```

## Add to config/app.php

Under Package Service Providers Add

```php
AwkwardIdeas\SwitchBlade\SwitchBladeServiceProvider::class,
```

# Available Directives

## Switch via Blade
A php switch statement implemented via blade. 

The switch statement is similar to a series of IF statements on the same expression. In many occasions, you may want to compare the same variable (or expression) with many different values, and execute a different piece of code depending on which value it equals to. This is exactly what the switch statement is for.

```blade
@switch($expression, $caseOne [, $caseTwo, $caseThree...])

@case($caseBlockOne)
    {{-- This will be triggered if "$expression" matches "$caseBlockOne" --}}
@endcase

@defaultcase
  {{-- This will be triggered when none of the cases matched "$caseBlockOne" --}}
@endswitch
```
  
---

## Variable Modification
Set, increment or decrement variables without having to go in and out of php.

```blade
{{-- Set the variable "$foo" equal to "hello world" --}}
@set('foo', 'hello world')

{{-- Increment the variable "$bar" by one --}}
@increment($bar)

{{-- Decrement the variable "$baz" by one --}}
@decrement($baz)
```

---

## Variable Output
Various ways to output variables to the screen.

```blade
{{-- Echoes the value safe for use in HTML attributes such as classes or ids --}}
@htmlAttribute($value)

{{-- Echoes the exploded result of the string split by the delimiter --}}
@explode($delimiter, $string)

{{-- Echoes the result of the imploded array by the delimiter --}}
@implode($delimiter, $array)
```

---

## Debug Tools
Some tools to more easily debug your Blade templates.

```blade
{{-- Dump the given variable(s) and stop execution of the script --}}
@dd($variable)

{{-- Dumps the given variable(s) to the screen --}}
@varDump($variable)

{{-- Echoes out the value of the given environment variable --}}
@getenv('APP_URL')
```

---

## Other helpful directives
Miscellaneous shortcuts for commonly used PHP structures.

```blade
{{-- Continue to the next iteration from in a loop --}}
@continue

{{-- Break out of a loop or switch statement --}}
@break
```

### If-variations

```blade
{{-- Check if the given variable is empty --}}
@ifempty($variable)

@endifempty

{{-- Check if the given varaible is null --}}
@ifnull($variable)

@endifnull

{{-- Check if the given variable is not null --}}
@notnull($variable)

@endnotnull

{{-- Optionally yield a section if it has a value --}}
@optional('section')

@endoptional

{{-- Check if a file exists --}}
@iffileexists($pathToFile)

@endiffileexists

{{-- Check if the given value's "count" value is greater than 0 --}}
@hascount($variable)

@endhascount
```

##Lang Modification

```blade
{{-- Modify the language configuration --}}
@lang('password_reset', 'Go ahead and reset your password!', 'en')
```
