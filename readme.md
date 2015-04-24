# Kwiki

[![Version](https://img.shields.io/packagist/v/fungku/kwiki.svg?style=flat-square)](https://packagist.org/packages/fungku/kwiki)
 [![Total Downloads](https://img.shields.io/packagist/dt/fungku/kwiki.svg?style=flat-square)](https://packagist.org/packages/fungku/kwiki)
 [![License](https://img.shields.io/packagist/l/fungku/kwiki.svg?style=flat-square)](https://packagist.org/packages/fungku/kwiki)
 [![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/fungku/kwiki.svg?style=flat-square)](https://scrutinizer-ci.com/g/fungku/kwiki/?branch=master)
 [![Build Status](https://img.shields.io/travis/fungku/kwiki.svg?style=flat-square)](https://travis-ci.org/fungku/kwiki)

## markdown wiki/blog

## Usage

Place your markdown files in the `/wiki` directory.

Categories are directories and subcategories are subdirectories.
 
If you place an `index.md` in a category or subcategory directory, it will be parsed and displayed after the list of 
subcategories and files.

The views are blade templates and located at `resources/views/wiki` and the master layout template is 
`resources/views/master.blade.php`
 
## Installation
 
Using composer:
 
```
$ composer create-project fungku/kwiki --prefer-dist
```
 
## Setup
 
From the project root, rename `.env.example` to `.env`
 
```
$ mv .env.example .env
```
 
Edit `.env` for your environment. i.e. change from *local* to *production* on your production server, and change
debug to false.

## Using a different parser

By default the markdown parser used is [erusev/parsedown](https://github.com/erusev/parsedown). To use a different one, 
you need to make your own parser that implements the `Parseable` interface or create an adapter for a different library
that implements `Parseable`. Then, you should change the binding in
`app/Providers/AppServiceProvider.php` to your custom parser.
 
```php
$this->app->bind(Parseable::class, MyCustomParser::class);
```

## Understanding the data passed to your views

You will have three variables you can use in your wiki page view:

1. `$breadcrumbs` is an array of breadcrumbs.
2. `$index` is available if you have navigated to a directory, or an empty array otherwise
    - `$index['subcategories']` is an array of subdirectories in your current directory
    - `$index['files']` is an array of files in your current directory
3. `$post` is a string of your parsed markdown content

## Changing default directories

Move or rename your wiki directory to wherever or whatever you want. Just update `app/Http/Controllers/WikiController.php`
constant `WIKI_PATH`.

Move or rename your wiki view template to wherever or whatever you want. Just update `app/Http/Controllers/WikiController.php`
constant `WIKI_VIEW_PAGE`.

## The default styling is very basic

By default we include a bootswatch theme from a CDN and `public/css/app.css` for custom styles.

Navigating to a category example:

![Very basic default styling](https://s3.amazonaws.com/fungku/kwiki/fungku-kwiki-category.png)