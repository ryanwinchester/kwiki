# kwiki

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
that implements `Parseable`. Then, to take advantage of the IOC container you need to change the binding in
`app/Providers/AppServiceProvider.php` to your custom parser.
 
```php
$this->app->bind(Parseable::class, MyCustomParser::class);
```