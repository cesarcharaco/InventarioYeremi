<?php 
function locales()
{
	$locales=App\Local::all();

	return $locales;
}