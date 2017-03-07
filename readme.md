# SwitchBlade: Custom Directives for the Laravel Blade templating engine

[![Latest Stable Version](https://poser.pugx.org/awkwardideas/switchblade/v/stable)](https://packagist.org/packages/awkwardideas/switchblade)
[![Total Downloads](https://poser.pugx.org/awkwardideas/switchblade/downloads)](https://packagist.org/packages/awkwardideas/switchblade)
[![Latest Unstable Version](https://poser.pugx.org/awkwardideas/switchblade/v/unstable)](https://packagist.org/packages/awkwardideas/switchblade)
[![License](https://poser.pugx.org/awkwardideas/switchblade/license)](https://packagist.org/packages/awkwardideas/switchblade)

## Install Via Composer

composer require awkwardideas/switchblade

## Add to config/app.php

Under Package Service Providers Add

AwkwardIdeas\SwitchBlade\SwitchBladeServiceProvider::class,


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
* ```@dd(variable)```
  * Does a dump and die on the variable
* ```@varDump(variable)```
  * Does a dump of the variable
* ```@getenv(ENV_VAR_NAME)```
  * Echos the environment variable

---

## Other helpful directives
* ```@continue```
  * Adds a php continue; tag to skip the rest of the current loop iteration
* ```@break```
  * Adds a php break; tag which ends the execution of a for, foreach, do-while or switch structure
  
  
### If empty  
* ```@ifempty(variable)```
  * If count of variable == 0
* ```@endifempty```
  * Ends if empty statement
  
### If null  
* ```@ifnull(variable)```
  * If variable is null
* ```@endifnull```
  * Ends if null statement
  
### Not Null
* ```@notnull(variable)```
  * If variable is not null
* ```@endnotnull```
  * Ends not null statement
  
### Optional Yield
* ```@optional('section')```
  * Outputs the content wrapped only if the referenced section has value
* ```@endoptional```
  * Ends optional output statement
  
### File exists
* ```@iffileexists(filepath)```
  * Tests file path, continuing only if file exists
* ```@endiffileexists```
  * Ends file exists condition

### Has Count
* ```@hascount(variable)```
  * Obtains the count of the variable, continuing if it is greater than 0
* ```@endhascount```
  * Ends has count condition
  
##Lang Modification
* ```@lang(key[, replace, locale])```
  * Modified to pass through to choice of 1, allowing plurals to be put in without having to have all singular usages changed to choice.