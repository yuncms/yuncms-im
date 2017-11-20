# TIM Extension for Yii 2


[![Latest Stable Version](https://poser.pugx.org/yuncms/yuncms-im/v/stable.png)](https://packagist.org/packages/yuncms/yuncms-im)
[![Total Downloads](https://poser.pugx.org/yuncms/yuncms-im/downloads.png)](https://packagist.org/packages/yuncms/yuncms-im)
[![Build Status](https://img.shields.io/travis/yuncms/yuncms-im.svg)](http://travis-ci.org/yuncms/yuncms-im)
[![Dependency Status](https://www.versioneye.com/php/yuncms:yuncms-im/dev-master/badge.png)](https://www.versioneye.com/php/yuncms:yuncms-im/dev-master)
[![License](https://poser.pugx.org/yuncms/yuncms-im/license.svg)](https://packagist.org/packages/yuncms/yuncms-im)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist yuncms/yuncms-im
```

or add
```json
"yuncms/yuncms-im": "~2.0.0"
```

to the `require` section of your composer.json.

## Configuring your application

Add following lines to your main configuration file:

```php
'bootstrap' => [
    'yuncms\im\Bootstrap',
],
'modules' => [
    'admin' => [
        'class' => 'yuncms\im\frontend\Module'   
    ],
],
```

## Updating database schema

After you downloaded and configured Yii2-admin, the last thing you need to do is updating your database schema by applying the migrations:

```bash
$ php yii migrate/up 
```

## License

This is released under the MIT License. See the bundled [LICENSE.md](LICENSE.md)
for details.