<?php
if (file_exists ("counter.txt")) {
$myfile = fopen("counter.txt", "r");
$count = fread($myfile,filesize ("counter.txt"));
echo $count + 1;
echo " hits";
fclose($myfile);
$myfile = fopen("counter.txt", "w");
fwrite ($myfile, $count+1);
}

else {
	$myfile = fopen ("counter.txt", "w");
	fwrite($myfile + 1);
	echo "1";
	fclose($myfile);
}
?>


