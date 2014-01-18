<?
// 11 

define('FOO', 10);

$array = array(10 => FOO,
               "FOO" => 20);

print $array[$array[FOO]] * $array["FOO"];
/*
class ClassOne {
  protected $a = 10;

  public function changeValue($b) {
    $this->a = $b;
  }
}

class ClassTwo extends ClassOne {

  protected $b = 10;

  public function changeValue($b) {
    $this->b = 10;
    parent::changeValue($this->a + $this->b);
  }

  public function displayValues() {
    print "a: {$this->a}, b: {$this->b}\n";
  }
}

$obj = new ClassTwo();

$obj->changeValue(20);
$obj->changeValue(10);

$obj->displayValues();


/*
$a = array(1 => "A", "B", "C");
$a[1] = "A"; $a[] = "B"; $a[] = "C";

print_r($a);


/*
static $x = 5;
function func($z)
{
	echo $x++;
	echo $x . '<br/>';
}
echo $x . '<br/>';
func(1);
func(2);
func(3);
echo $x . '<br/>';

/*
print 'Text Line1'
print 'Text Line2'

		
/*
$a = array(1=>'1', 2=> '2', 3=>'3');
$b = array(4=>'4', 5=>'5');

//echo ($a + $b);
print_r($a + $b);
/*
for ($i = 0; $i < 5; ++$i)
{
	if ($i ==2); continue;
	print "$i\n";
} 


/*
$var = 1 + "-1.3e3";
echo $var;

/*
$a = 12;
if($a > 6 OR < 16)
  echo "true";
else
  echo "false"
/*
If you want to define class objects as session variables through session_register, we have to:

/*
$x = 0xFFFE; 
$y = 2; 
$z = $x && $y; 

var_dump($z);

/*
$great = 'fantastic';
 echo "This is {$great}";   

/*

while (1==1): echo 'here'; exit(); endwhile;

/*
function fun($x, $y)
{
if($x <= 0)
{
return $y;
}
else
{
return (1+fun($x-1,$y));
}
}

echo fun(5,10);

/*

echo (int) ( (0.1+0.7) * 10 );

/*
Associativity of += is? 
/*
echo "5.0" == "5";
/*
echo  0500;

/*
print null == NULL;
/*
$a = 0;
echo ~$a;

/*
echo false;

/*
$s = "Hello world!";
print $s{4};

/*
echo (2) . (3 * (print 3)); // 323

/*
interface InterfaceA {}
class Test implements InterfaceA {}

$a = new Test;

var_dump($a instanceof Test);
var_dump($a instanceof InterfaceA);

*/
// $math = "3 + 2 / 7 - 9";
// $stack = preg_split("/ *([+-\/*]) */", $math, -1, PREG_SPLIT_DELIM_CAPTURE);
// print_r($stack);

/*
$zipcode = '55555 4444';
$pat = '/^d{5}(-d{4})?$/';
$mat = preg_match($pat, $zipcode, $matches);

if($mat)
	echo 'ok';
else
	echo 'not ok';

/*
class first {
	protected $result = "123";
	function display() {
		echo $this->result . "<br/>";
	}
}

class second extends first {
	protected $result = "456";
	function display1() {
		echo $this->result . "<br/>";
		$this->display();
	}
}
$check = new second();
$check->display1();

/*
echo $_SERVER['PHP_SELF'] . '<br/>';
echo $_SERVER['SCRIPT_NAME'] . '<br/>';
echo $_SERVER['REQUEST_URI'] . '<br/>';
echo __FILE__;
/*
function a($n){
	b($n);
	return($n * $n);
}

function b(&$n) {
	$n++;
}
echo a(5);
*/
/*
mysql_fetch_row();
/*
$a = 3;
$b = 2;
echo (int)$a/(int)$b;

/*
error_reporting(0);
define('MY_VAR', 10);

if(defined('MY_VAR'))
{
	echo 'here';
	define('MY_VAR', 20);
}
else
{
	define('MY_VAR', 30);
}

echo MY_VAR;


/*
ROLLBACK TRANSACTION
/*
$doc = domxml_new_doc('1.0');
$node = $doc->create_element('test');
$node = $doc->append_child($node);
$children = $doc->children();

print_r($children);

$doc2 = $node->parent_node();
$children = $doc2->children();
print_r($children);

/*
class Foo {
	function Variable() {
		$name = 'Bar';
		$this->$name();
	}
	
	function Bar() {
		echo 'this is Bar';
	}
}

$foo = new Foo();
$funcname = 'Variable';
$foo->$funcname();
/*
$a = 'Hello';
$b = 'hello';

if($a === $b) echo 'here';

/*
error_reporting(E_ALL);
//php_ini('display_errors', 1);
$temp = new Test();
echo "Test A:" . Test::$static_property . "<br/>";
echo "Test B:" . $temp->get_sp() . "<br/>";
echo "Test C:" . $temp->static_property . "<br/>";

class Test 
{
	static $static_property = "I'm static";
	function get_sp() {
		return self::$static_property;
	}
}
/*
$object = new Son;
$object->test();
$object->test2();

class Dad {
	function test() {
		echo "[Class Dad] I am your Father<br/>";
	}
}
class Son extends Dad {
	function test() {
		echo "[Class Son] I am Luke<br/>";
	}
	function test2() {
		parent::test();
	}
}


/*

class BaseClass {
	static function dump() {
		echo __CLASS__ . '::dump() 1';
	}
	static function callDump() {
		self::dump();
	}
}

class ChildClass extends BaseClass {
	static function dump() {
		echo __CLASS__ . '::dump() 2';
	}
}

ChildClass::callDump();

/*
$text = "mailto:abc@xyz.com?subject=Contact";
preg_match('/.*@([^?]*)/', $text, $output);
echo $output[1];
/*
abstract class one {
	public function __construct() {
		var_dump(get_class($this));
		var_dump(get_class());
	}
}

class two extends one {
}

new two;
*/
?>