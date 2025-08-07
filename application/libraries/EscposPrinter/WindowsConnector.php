<?php
require_once APPPATH.'libraries/EscposPrinter/Connector.php';

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class WindowsConnector implements Connector
{
	private $printer;

    public function connect($ip)
    {
	    $this->printer = new Printer(new WindowsPrintConnector($ip));
    }

    public function close()
    {
	    $this->printer->close();
    }

	public function getPrinter()
	{
		return $this->printer;
	}
}
