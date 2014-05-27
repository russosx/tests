<?php

/**
 * @author Ruslan Kladko
 * @package test
 *
 */

interface StatementFilter {
	public function apply(array $statement);
}

class PaymentFilter implements StatementFilter {
	
	private $conditions = [];

	public function __construct(array $conditions) {
		$this->conditions = $conditions;
	}

	public function apply(array $statement) {
		$conditions = $this->conditions;
		$filtered = array_filter($statement, function($line) use ($conditions) {
			$satisfied = TRUE;
			foreach($conditions as $column => $regex) {
				$satisfied = $satisfied && preg_match($regex, $line[(int)$column]);
			}
			return $satisfied;
		});
		return $filtered;
	}
}
