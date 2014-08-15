<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 13/08/14
 * Time: 14:20
 */

namespace Odesk\RKladko\Tests;

require_once "./vendor/autoload.php";

//header('Content-Type: text/html; charset=utf-8');

class PHPFrontV2_TestCase extends \PHPUnit_Framework_TestCase
{

    public function provider_fantastic3()
    {
        return [
            [-1, 0], [0, 0], [1, 0], [2, 1], [3, 1], [4, 1],
            [7, 5], [9, 16], [15, 601], [35, 117897841]
        ];
    }

    /**
     * @dataProvider provider_fantastic3
     * @param $n
     * @param $expected
     */
    function test_fantastic3($n, $expected)
    {
        $this->assertEquals($expected, fantastic3($n));
        //@todo: Don`t loose your mind
    }

    function provider_countDays()
    {
        return [
            ['01.15.2012', 15], ['02.01.2014', 32], ['Not valid. date', 'Bad format'],
        ];
    }

    /**
     * @dataProvider provider_countDays
     * @param $dateInString
     * @param $expected
     */
    function test_countDays($dateInString, $expected)
    {
        $this->assertEquals($expected, countDays($dateInString));
    }

    function provider_changeNickname()
    {
        $users = [
            ['username' => 'james', 'nickname' => 'web_master'],
            ['username' => 'carlos', 'nickname' => 'super_carlos']
        ];
        return [
            ['web_master', 'james_web_master', $users, 'Your nickname has been changed from web_master to james_web_master'],
            ['1web_master', 'james_web_master', $users, 'Failed to update'],
            ['web_master', 'super_carlos', $users, 'Failed to update'],
            ['web_master', '3james_web_master', $users, 'Failed to update'],
            ['web_master', 'james_4web_master', $users, 'Your nickname has been changed from web_master to james_4web_master'],
            ['web_master', 'james_4web_$#<>-_', $users, 'Your nickname has been changed from web_master to james_4web_$#<>-_'],
        ];
    }

    /**
     * @dataProvider provider_changeNickname
     * @param $oldNickname
     * @param $newNickname
     * @param $users
     * @param $expected
     */
    public function test_changeNickname($oldNickname, $newNickname, $users, $expected)
    {
        $this->assertEquals($expected, changeNickname($oldNickname, $newNickname, $users));
    }

    public function provider_calculateShippingFees()
    {
        return [
            [[new InternationalShipping(5, 50, 150), new LocalShipping(6, 35)], 1268],
        ];
    }

    /**
     * @dataProvider provider_calculateShippingFees
     * @param array $shippings
     * @param $expected
     */
    public function test_calculateShippingFees(array $shippings, $expected)
    {
        $this->assertEquals($expected, calculateShippingFees($shippings));
    }

}

// Do not modify the Shipping class.
abstract class Shipping
{
    private $_itemsCount;
    private $_distance;

    public function __construct($itemsCount, $distance)
    {
        $this->_itemsCount = $itemsCount;
        $this->_distance = $distance;
    }

    abstract public function getFees();

    public function getDistance()
    {
        return $this->_distance;
    }

    public function getItemsCount()
    {
        return $this->_itemsCount;
    }
}

// You can modify code below this comment.
class InternationalShipping extends Shipping
{
    private $_internationalDistance;

    public function __construct($itemsCount, $distance, $internationalDistance)
    {
        parent::__construct($itemsCount, $distance);
        $this->_internationalDistance = $internationalDistance;
    }

    public function getInternationalDistance()
    {
        return $this->_internationalDistance;
    }

    public function getFees()
    {
        $fee = $this->getItemsCount() * ($this->getDistance() * .8 + $this->getInternationalDistance() * 1.2);
        return $fee;
    }
}

class LocalShipping extends Shipping
{
    public function getFees()
    {
        $fee = $this->getItemsCount() * $this->getDistance() * .8;
        return $fee;
    }
}

function calculateShippingFees($items)
{
    $sum = 0;
    foreach ($items as $item) {
        if ($item instanceof Shipping) {
            $sum += $item->getFees();
        }
    }
    print $sum;
    return $sum;
}

// Do NOT call the calculateShippingFees function in the code
// you write. The system will call it automatically.
/**
 * @param $oldNickname
 * @param $newNickname
 * @param $users
 * @return string
 */
function changeNickname($oldNickname, $newNickname, $users)
{
    $result = false;
    foreach ($users as $user) {
        if ($user['nickname'] == $oldNickname) {
            $result = TRUE;
            break;
        }
    }
    if ($result) {
        foreach ($users as $user) {
            if ($user['nickname'] == $newNickname) {
                $result = FALSE;
                break;
            }
        }
        if ($result) {
            $result = preg_match('/^[\D][\w$#<>\-]+$/i', $newNickname) === 1;
        }
    }
    if ($result) {
        $ret = "Your nickname has been changed from $oldNickname to $newNickname";
    } else {
        $ret = 'Failed to update';
    }
    echo $ret;
    return $ret;
}

/*
 * Test 2
 */
function countDays($dateInString)
{
    $date_end = date_create_from_format('m.d.Y', $dateInString);
    if ($date_end === FALSE) {
        return 'Bad format';
    } else {
        $year = date('Y', $date_end->getTimestamp());
        $date_start = date_create_from_format('m.d.Y', "01.01.$year");
        $days_diff = (int)($date_end->diff($date_start)->days + 1);
        echo $days_diff;
        return $days_diff;
    }
}

/*
 * Test 1
 */
function fantastic3($n)
{
    global $calculated;
    if ($n <= 1) return 0;
    if ($n == 2 or $n == 3) return 1;
    $nth = 0;
    for ($i = 1; $i <= 3; ++$i) {
        if (!isset($calculated[$n - $i])) {
            $calculated[$n - $i] = fantastic3($n - $i);
        }
        $nth += $calculated[$n - $i];
    }
    $nth = $nth - 1;
    echo $nth;
    return $nth;
}
