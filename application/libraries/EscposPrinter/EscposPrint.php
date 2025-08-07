<?php
require_once APPPATH . 'libraries/EscposPrinter/Connector.php';
require_once APPPATH . 'libraries/EscposPrinter/Printable.php';

class EscposPrint implements Printable
{
	protected $connector;

	public function __construct(Connector $connector)
	{
		$this->connector = $connector;
	}

	public function printText($text)
	{
		try {
			$this->getPrinter()->text($text);
			$this->getPrinter()->cut();
			return true;
		} catch (Exception $e) {
			return $e->getMessage();
		} finally {
			$this->connector->close();
		}
	}

	public function getPrinter()
	{
		return $this->connector->getPrinter();
	}
}
