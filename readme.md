# EloquentComposite: Composite Handling for Eloquent

[![Latest Stable Version](https://poser.pugx.org/awkwardideas/eloquentcomposite/v/stable)](https://packagist.org/packages/awkwardideas/eloquentcomposite)
[![Total Downloads](https://poser.pugx.org/awkwardideas/eloquentcomposite/downloads)](https://packagist.org/packages/awkwardideas/eloquentcomposite)
[![Latest Unstable Version](https://poser.pugx.org/awkwardideas/eloquentcomposite/v/unstable)](https://packagist.org/packages/awkwardideas/eloquentcomposite)
[![License](https://poser.pugx.org/awkwardideas/eloquentcomposite/license)](https://packagist.org/packages/awkwardideas/eloquentcomposite)

## Install Via Composer

composer require awkwardideas/eloquentcomposite

## Add to config/app.php

Under Package Service Providers Add

AwkwardIdeas\EloquentComposite\EloquentCompositeServiceProvider::class,

## Use statement on Model

In your model, replace this line:
use Illuminate\Database\Eloquent\Model

With this:
use AwkwardIdeas\EloquentComposite\Model;


## Code use

In your model set the following:
protected $connection = '[your_connection_name_here]';
protected $table = '[your_table_name_here]';
protected $compositeKey = ['your', 'composite', 'key', 'columns'];

Then to update a specific column, use:
$this->UpdateWithComposite('column_name');
