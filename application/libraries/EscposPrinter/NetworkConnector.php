<?php
require_once APPPATH . 'libraries/EscposPrinter/Connector.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

class NetworkConnector implements Connector
{
	private $printer;

	/**
	 * @throws Exception
	 */
	public function connect($ip)
    {
		$this->printer = new Printer(new NetworkPrintConnector($ip));
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
