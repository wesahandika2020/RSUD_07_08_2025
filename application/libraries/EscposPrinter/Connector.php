<?php

interface Connector
{
	public function connect($ip);
	public function close();
}
