# mod-license

Module for PIXELION CMS

[![Latest Stable Version](https://poser.pugx.org/panix/mod-license/v/stable)](https://packagist.org/packages/panix/mod-license)
[![Total Downloads](https://poser.pugx.org/panix/mod-license/downloads)](https://packagist.org/packages/panix/mod-license)
[![Monthly Downloads](https://poser.pugx.org/panix/mod-license/d/monthly)](https://packagist.org/packages/panix/mod-license)
[![Daily Downloads](https://poser.pugx.org/panix/mod-license/d/daily)](https://packagist.org/packages/panix/mod-license)
[![Latest Unstable Version](https://poser.pugx.org/panix/mod-license/v/unstable)](https://packagist.org/packages/panix/mod-license)
[![License](https://poser.pugx.org/panix/mod-license/license)](https://packagist.org/packages/panix/mod-license)


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

#### Either run

```
php composer require --prefer-dist panix/mod-license "*"
```

or add

```
"panix/mod-license": "*"
```

to the require section of your `composer.json` file.


#### Add to web config.
```
    'modules' => [
        'license' => ['class' => 'panix\mod\license\Module'],
    ],
```
#### Migrate
```
php yii migrate --migrationPath=vendor/panix/mod-license/migrations
```
