ElapsedTime
===========

A format utility for translating elapsed seconds to hours, minutes and seconds and back.

* Author:  Nick Runco (nick@runstrong.com)
* http://www.runstrong.com
* license: MIT
* version: 1.0.0

## Usage

Initialize in bootstrap.php:

CakePlugin::load('ElapsedTime');

*In a controller:*

$this->ElapsedTime->absFormat($timeInSeconds,$full,$leading,$array);

$this->ElapsedTime->inSeconds($array('hours' => $hours, 'minutes' => $minutes, 'seconds' => $seconds));

*In a model:*

$this->absFormat($timeInSeconds,$full,$leading,$array);

$this->inSeconds($array('hours' => $hours, 'minutes' => $minutes, 'seconds' => $seconds));

*In a view:*

$this->ElapsedTime->absFormat($timeInSeconds,$full,$leading,$array);

$this->ElapsedTime->inSeconds($array('hours' => $hours, 'minutes' => $minutes, 'seconds' => $seconds));


## Options

full = true: returns zeroes for all empty fields

leading = true: returns leading zeroes for all fields

array = false (default): = returns a string of time separated by ':'

array = true: returns an array of times with keys 'hours', 'minutes', 'seconds'


## Examples

return $this->ElapsedTIme->absFormat(321);

=> '5:21'

return $this->ElapsedTIme->absFormat(321,true,true);

=> '00:05:21'

return $this->ElapsedTIme->absFormat(321,null,null,true);

=> array('hours' => '0', 'minutes' => '5', 'seconds' => '21')

return $this->ElapsedTIme->absFormat(321,true,true,true);

=> array('hours' => '00', 'minutes' => '05', 'seconds' => '21')


## Changelog
* 1.0 Initial release