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

* ```@switch(expression, caseStatement1 [, caseStatement2, caseStatement3...])```
  * This is the blade call to start the switch. It requires the expression and the first case statement. Optionally you can add as many case statements as you would like, which would all execute the code between the start of the switch and the first ```@endcase``` call.
* ```@endcase```
  * Add this to end the case statement.  Only one is needed to stop all prior cases.
* ```@case(caseStatement1 [, caseStatement2, caseStatement3...])```
  * Add this to start a case statement. Optionally you can add as many case statements as you would like, which would all execute the code between the ```@case```and next ```@endcase``` call.
* ```@defaultcase```
  * Add this near the bottom of the switch to handle any variants of the expression which may not have been captured by a case statement. No end case is necessary since it will end with ```@endswitch```
* ```@endswitch```
  * Add this to end your switch statement

---

## Variable Modification
Set, increment or decrement variables without having to go in and out of php.
* ```@set(variable, value)```
* ```@increment(variable)```
* ```@decrement(variable)```

---

## Variable Output
* ```@htmlAttribute(value)```
  * Echos the value safe for use in html attributes like id
* ```@explode(delimiter, string, index)```
  * Echos the index of the exploded result of the string, split by the delimiter
* ```@implode(delimiter, array)```
  * Echos the string result of the array joined by the delimiter

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
  
##Bag
* ```@bag(variable[,value])```
  * Appends a variable to a bag, or echos the bag as a list