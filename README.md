# seo-module-magento2

Using this module you can optimize HTML output. The result is one line, minimized with those needed whitespace HTML. As a result, is better performance, page speed insight test score and user experience.

* move all stylesheets before body end
* move all scripts before body end - all types (external and internal) in correct order
* remove unnecessary whitespaces
* remove html comments

You can also provide your own processors and disable any of the above by configuration.

## Installation

Your composer.json
```
"repositories": [
    { 
        "type": "git",
        "url": "https://github.com/hubertinio/seo-module-magento2.git"
    }
], 
```
...aaaand then...
```
composer require hubertinio/seo-module-magento2 0.1.0
```
