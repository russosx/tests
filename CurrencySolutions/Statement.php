<?php

require_once 'StatementReader.php';
require_once 'StatementFilter.php';
require_once 'StatementAggregator.php';

/*
 * Class for storing Statement (Model)
 */
class Statement {
	
	private $filename;
	private $statement = [];

	public function __construct($filename) {
		$this->filename = $filename;
	}

	public function getStatement() {
		return $this->statement;
	}

	/*
	 * Read statement by means of Reader
	 */
	public function load(StatementReader $reader) {
		$this->statement = $reader->read($this->filename);
	}

	/*
	 * Returns filtered statement
	 */
	public function filterBy(StatementFilter $filter) {
		return $filter->apply($this->statement);
	}

}
