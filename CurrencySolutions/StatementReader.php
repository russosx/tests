<?php

/**
 * @author Ruslan Kladko
 * @package test
 *
 */

interface  StatementReader {
	public function read($filename);
}

class StatementReaderCSV implements StatementReader {
	public function read($filename) {
		$data = [];
		$fh = fopen($filename, 'r');
		if ($fh !== FALSE) {
			while ($recs = fgetcsv($fh, 128)) {
				$data[] = $recs;
			}
			fclose($fh);
		}
		return $data;
	}
}
