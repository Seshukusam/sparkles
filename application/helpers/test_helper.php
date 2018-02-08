<?php
function test_my_helper()
{
	echo "Welcome to custom helpers";
}

function format_str($pstr)
{
		$rstr=trim(addslashes(strip_tags($pstr)));
		return $rstr;
}
function last_word($pstr)
{
	$arr=explode(" ",$pstr);
	$lw=end($arr);
	return $lw;
}
?>