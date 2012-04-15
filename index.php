<?php

ini_set("display_errors","on");
error_reporting(E_ALL && E_NOTICE);

if ($_SERVER['DOCUMENT_ROOT'])
	echo "<pre>";

echo PHP_EOL;

$files = array('numbers','strings');

$progress = json_decode(file_get_contents('progress.json'));

$total = 0;
$current = -1;
$stage = 0;
$failed = false;
$stages = count($files);

foreach($files as $file) {
	if(!empty($file)) {
		$exec = shell_exec('phpunit --log-json=result.json '.__DIR__.'/tests/test_'.$file.'.php');

		$results = json_decode('['.str_replace('}{','},{',file_get_contents("result.json")).']',true);

		//print_r($results);

		$total += $results[0]['tests'];
		
		if (!$failed) {
			$stage++;
			foreach ($results as $result) {
				if (array_key_exists('status', $result))
				$current++;

			 	if ($result['status'] == 'fail') {
			 		$failed = true;
			 		switch ($result['message']) {
		 				case 'Failed asserting that two strings are equal.':
		 					echo "Failed asserting that '".$result['trace'][0]['args'][1].
		 						"' matches expected '".$result['trace'][0]['args'][0].
		 						"' in file tests/test_".$file.'.php on line '.$result['trace'][0]['line'].'.'.PHP_EOL.PHP_EOL;
		 					break 2;
		 				default:
		 					echo substr($result['message'],0,strlen($result['message'])-1).
		 						' on line '.$result['trace'][0]['line'].
		 						' in file tests/test_'.$file.'.php'.PHP_EOL.PHP_EOL;
		 					break 2;
		 			}
			 	}
			}
		}

	}
}
		echo $progress->{$current+1}.PHP_EOL.PHP_EOL.
		"You are on Stage ".$stage." of ".$stages.PHP_EOL.
		"You have completed ".$current." tests of ".$total.PHP_EOL.PHP_EOL;

?>
