<?php

require_once 'Statement.php';

/**
 * @author Ruslan Kladko
 * @package test
 *
 */
class Bootstrap
{
	public static function main($argv)
	{
		// Empty
		if (count($argv) < 2) {
			echo "Statement file not provided\n";
			exit(-1);
		}

		$filename = $argv[1];

		// Read statement
		$statement = new Statement($filename);
		$statement->load(new StatementReaderCSV());
		if (count($statement) == 0) {
			echo sprintf("Statement file '%s' emtpy or doesn`t exist\n", $filename);
			exit(-2);
		}

		// Filter payments
		$conditions = ["0" => "/^06\/03\/2011$/", "1" => "/^PAY\d{6}\w{2}$/"];
		$payments = $statement->filterBy(new PaymentFilter($conditions));

		// Aggregate by currency
		$aggregator = new CurrencyAggregator($payments);
		$report = $aggregator->apply();

		// Print payments
		echo "Totals\n";
		foreach($report as $curr => $value) {
			printf("{$curr} {$value}\n");
		}
	}
}

Bootstrap::main($argv);
