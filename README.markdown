Sosumi
=========

Sosumi is a PHP client for Apple's Find My iPhone service. This allows you to programmatically retrieve your devices's current location and push messages (and an optional alarm) to the remote device.

The previous version of Sosumi (June 2009 - June 20, 2010) scraped MobileMe's website to determine your location information. However, with Apple's new (as of June 2010) [Find My iPhone app](http://itunes.apple.com/us/app/find-my-iphone/id376101648?mt=8), we can piggy-back on their "official" JSON web service and pull your information much faster and more reliably as it's not prone to breaking whenever there's a website update. I highly recommend upgrading to the new version.

Much love to the MobileMe/iCloud team for a wonderful service :-)

**Looking for the Mac desktop version of Sosumi?** [Click here](https://github.com/tylerhall/MacSosumi).

FEATURES
--------

 * Retrieve your device's current location and margin of error.
 * Push a custom text message to the device and an optional audible alarm.
 * Save the location of your device in a database and plot it on a Google Map

INSTALL
-------

This script requires PHP 5.2 and the JSON extension, which should be included by default. PHP's CURL extension (with SSL support) is also required.
To use the location recording, you obviously need a MySQL Server. To plot it you need a PHP version with DOM manipulation support.

Insert your iCloud and MySQL Credentials in settings.php an run install.php. This will create the required table in the database.

Then create a cronjob to run cron.php in a certain interval (I use 1 hour, as every location request will stress your phone's battery).

index.php then shows the map with your location(s).


UPDATES
-------

Code is hosted at GitHub: [http://github.com/tylerhall/sosumi](http://github.com/tylerhall/sosumi)

My fork: [http://github.com/derintendant/sosumi](http://github.com/derintendant/sosumi)

OTHER LANGUAGES / RELATED PROJECTS
----------------------------------

 * Python port - [https://github.com/comfuture/recordmylatitude](https://github.com/comfuture/recordmylatitude)
 * Node.js port - [http://github.com/drudge/node-sosumi](http://github.com/drudge/node-sosumi)
 * Ruby port - [http://github.com/hpop/rosumi](http://github.com/hpop/rosumi)
 * PlayNice - Automatically update your Google Latitude location using Sosumi [http://github.com/ablyler/playnice](http://github.com/ablyler/playnice)

LICENSE
-------

The MIT License

Copyright (c) 2011 Tyler Hall <tylerhall AT gmail DOT com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
