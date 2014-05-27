<?php

/**
 * @author Ruslan Kladko
 * @package test
 *
 */

abstract class StatementAggregator {
	
	protected $statement = NULL;
	
	public function __construct(array $statement) {
		$this->statement = $statement;
	}

	abstract public function apply();
}

class CurrencyAggregator extends StatementAggregator {
	public function apply() {
		$result = [];
		foreach ($this->statement as $line) {
			$result[$line[9]] += floatval($line[8]);
		}
		return $result;
	}
}
