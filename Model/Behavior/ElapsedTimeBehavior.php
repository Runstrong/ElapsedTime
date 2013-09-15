<?php
App::uses('Behavior', 'Model');

class AbsoluteTimeBehavior extends ModelBehavior {

	public function absFormat(Model $model, $total_secs,$full = false,$leading = false,$array = false) {
    	// retuns time as formatted string.

        //5:21
        //full, leading: 00:05:21
        //array: 0, 5, 21
        //array, leading: 00, 05, 21

    	$rem = $total_secs % 3600; // 4071%3600 = 471 secs.
    	$hours = floor(($total_secs - $rem)/3600); // 1
    	$secs = $rem % 60; // 471%60 = 51 secs.
        $mins = floor($rem / 60);

        if ($leading || $full) {
            if ($hours || $full) $hours = str_pad(($hours), 2, '0', STR_PAD_LEFT);
            if ($mins || $full) $mins = str_pad(($mins), 2, '0', STR_PAD_LEFT);      
        }
        $secs = str_pad(($secs), 2, '0', STR_PAD_LEFT);
        if ($array) return array('hours' => $hours, 'minutes' => $mins, 'seconds' => $secs);

        $string = '';
    	if (!empty($hours) || $full) $string = $hours.':';
    	$string .= $mins.':'.$secs;
    	
        return $string;
    }

    public function inSeconds(Model $model, $time) {
    	// retuns time as seconds.
    	$secs = $time['hours']*3600 + $time['minutes']*60 + $time['seconds'];
        return intval($secs);
    }
}
?>