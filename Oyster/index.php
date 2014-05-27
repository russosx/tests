<?php

echo "1. Приведите код, стартующий сессию и регистрирующий переменную сессии \"current_project\" со значением \"all_apps\"<br>";

session_start();
$_SESSION['current_project'] = 'all_apps';
echo session_id() . ": " . "{$_SESSION['current_project']}";

echo '<br>';
echo "2. Приведите код, который считывает и выводит из текстового файла /var/log/aqua.log 10 первых символов <br>";

$fh = fopen('aqua.log', 'r');
$n = 10;
if ($fh !== FALSE && $output = fgets($fh, $n+1)) {
	echo "$output";
	fclose($fh);
}

echo '<br>';
echo "3. Приведите код, который с помощью PCRE функции заменит вхождение \"%user_name%\" в строке \"Hello, %user_name%!\" на \"John Doe\" <br>";

$subject = "Hello, %user_name%!";
$replacement = "John Doe";
echo preg_replace('/%user_name%/i', $replacement, $subject);

echo '<br>';
echo "4. Приведите код функции, которая рекурсивно будет вычислять N факториал. N передается аргументом в функцию <br>";

function factorial($n) {
	if ($n == 0)
		return 1;
	return $n * factorial($n-1);
}
echo factorial(10);

echo '<br>';
echo '5. Реализуйте класс, экземпляр которого при преобразовании в строку (echo $object) будет возвращать имя класса <br>';

class MagicName {
	public function __toString()
	{
		return __CLASS__;
	}
}
$object = new MagicName();
echo $object;

echo '<br>';
echo '6. Приведите код класса, реализируещего SPL интерфейс Iterator<br>';

class OysterIterator implements Iterator {

	private $pos = 0;

	private $data = [
		'Crassostrea gigas', 'Crassostrea sikamea', 
		'Crassostrea virginica', 'Ostrea edulis',
		];

	public function __construct() {
        $this->pos = 0;
    }

    public function rewind() {
        $this->pos = 0;
    }

    public function current() {
        return $this->data[$this->pos];
    }

    public function key() {
        return $this->pos;
    }

    public function next() {
        ++$this->pos;
    }

    public function valid() {
        return isset($this->data[$this->pos]);
    }
}

$iterator = new OysterIterator();
foreach ($iterator as $key => $value) {
	var_dump($key, $value);
}

echo '<br>';
echo '7. Приведите простейший пример использования позднего статического связывания<br>';

class Foo {
	public static function text() {
		echo __CLASS__;
	}

	public static function testLateBinding() {
		static::text();
	}
}

class Bar extends Foo {
	public static function text() {
		echo __CLASS__;
	}
}

echo Bar::testLateBinding();

echo '<br>';
echo '<br>';
