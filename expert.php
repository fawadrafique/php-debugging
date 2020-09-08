<?php

declare(strict_types=1);

// === Exercise 1 ===
// Below we're defining a function, but it doesn't work when we run it.
// Look at the error you get, read it and it should tell you the issue...,
// sometimes, even your IDE can tell you what's wrong
echo "Exercise 1 starts here:";

function new_exercise($x)
{
    $block = "<br/><hr/><br/><br/>Exercise $x starts here:<br/>";
    echo $block;
}


/*
How I fixed the error in exercise 1?
 Error:
 Undefined variable: x in D:\WebPages\local-server\index.php on line 13
 Same error reported by VS Code intelephense extention, Undefined variable '$x'.
 Fix:
 Declare variable $x within new_exercise() parameters i.e. new_exercise($x)
*/
new_exercise(2);

// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[0];

echo $monday;


/*
 How I fixed the error in exercise 2?
 Error:
 Browser outputs tuesday instead of monday
 Fix:
 Variable $week is indexed array as index always starts at 0. To print monday index has to be 0 i.e. $week[0]
*/
new_exercise(3);

// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

$str = "Debugged ! Also very fun";
echo substr($str, 0, 10);


/*
 How I fixed the error in exercise 3?
 Error:
 Parse error: syntax error, unexpected '!' in D:\WebPages\local-server\index.php on line 47
 Fix:
 Varible $str was declared using opening and closing quote marks. Replacing it with straight double qoute resolved the error.
*/
new_exercise(4);

// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!

foreach ($week as &$day) {
    $day = substr($day, 0, -3);
}

print_r($week);



/*
 How I fixed the error in exercise 4?
 Error:
 Browser outputs array as it is.
 Fix:
 To alter an array with foreach it has to be passed by reference i.e. &$day
*/
new_exercise(5);

// === Exercise 5 ===
// The array should be printing every letter of the alphabet (a-z) but instead it does that + aa-yz
// Fix the code so the for loop only pushes a-z in the array

$arr = [];
for ($letter = 'a'; $letter <= 'z'; $letter++) {
    if (strlen($letter) == 1) {
        array_push($arr, $letter);
    }
}

print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alphabetical array


/*
 How I fixed the error in exercise 5?
 Error:
 Browser outputs array of the alphabet (a-z) but also it keep on incrementing like + aa-yz
 Fix:
 Array ([0] => a, [1] => b, [2] => c, ...) a-z alphabetical array, 
 one possible fix is to use conditional if statement with strlen($letter) == 1 parameter
*/
new_exercise(6);


// === Exercise 6 ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are randomly combined as seen in the code, fix all the bugs whilst keeping the functionality!
// Examples: captain strange, ant widow, iron man, ...
$arr1 = [];


function combineNames($str1 = "", $str2 = "")
{
    $params = [$str1, $str2];
    foreach ($params as &$param) {
        if ($param == "") {
            $param = randomHeroName();
        }
    }

    return implode(" ", $params);
}


function randomGenerate($arr1, $amount)
{
    for ($i = $amount; $i > 0; $i--) {
        array_push($arr1, randomHeroName());
    }

    return $amount;
}

function randomHeroName()
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    $randname = $heroes[rand(0, 1)][rand(0, 10)];

    return $randname;
}

echo "Here is the name: " . combineNames();


/*
 How I fixed the error in exercise 6?
 Error:
 Intended results were not displayed.
 Fix:
 Line 133: missing ';'
 Line 121: return instead of an echo
 Line 139: $heroes is a multidimensional array, and it has 2 rows so instead of rand(0,count($heroes) it must be rand(0,1)
 Line 141: return instead of an echo
*/
new_exercise(7);

// === Exercise 7 ===
///
///
///
function copyright($year)
{
    return "&copy; $year BeCode";
}
//print the copyright
echo copyright(date('Y'));


/*
 How I fixed the error in exercise 7?
 Error:
 Uncaught TypeError: Argument 1 passed to copyright() must be of the type int, string given
 Fix:
 Line 160: remove int from function arguments
 Line 165: add echo ahead of funtion to output the results
*/
new_exercise(8);

// === Exercise 8 ===
///
///
///
function login(string $email, string $password)
{
    if ($email == 'john@example.be' && $password == 'pocahontas') {
        return 'Welcome John Smith<br />';
        //return ' Smith';
    }
    return 'No access<br />';
}
/* do not change any code below */
//should greet the user with his full name (John Smith)
echo login('john@example.be', 'pocahontas');
//Should say: no access
echo login('john@example.be', 'dfgidfgdfg');
//Should say: no access
echo login('wrong@example', 'wrong');
/* You can change code again */


/* 
 How I fixed the error in exercise 8?
 Error:
 There were no errors but result were not as expected
 Fix:
 Line 183: 2 return statements, can be combined as one return
 Line 181: Only John Smith can access, therefore changed or operator '||' to and operator &&
 <br /> added to echo on new line
*/
new_exercise(9);


// === Exercise 9 ===
///
///
///
function isLinkValid(string $link)
{
    $unacceptables = array('https:', '.doc', '.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) == true) {
            return 'Unacceptable Found<br />';
        }
    }
    return 'Acceptable<br />';
}
//invalid link
echo isLinkValid('http://www.google.com/hack.pdf');
//invalid link
echo isLinkValid('https://google.com');
//VALID link
echo isLinkValid('http://google.com');
//VALID link
echo isLinkValid('http://google.com/test.txt');


/*
 How I fixed the error in exercise 9?
 Error:
 White screen
 Fix:
 Line 223, 225, 227 and 229: Return value from functions, thus add echo in front of every function call
*/
new_exercise(10);


// === Exercise 10 ===
///
//Filter the array $areTheseFruits to only contain valid fruits
//do not change the arrays itself
$areTheseFruits = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validFruits = ['apple', 'pear', 'banana', 'cherry', 'tomato'];
//from here on you can change the code
for ($i = 0; $i <= count($areTheseFruits); $i++) {
    if (!in_array($areTheseFruits[$i], $validFruits)) {
        unset($areTheseFruits[$i]);
    }
}
var_dump($areTheseFruits); //do not change this


// Bonus round
// Below are 5 characters (the space included)
// Find out why the substring with limit 10 still shortens the string, and what might be a solution (not easy)
$str = "안녕 세상";
echo mb_substr($str, 0, 10);

// $str is not a single-byte string (e.g. US-ASCII, ISO 8859 family, etc.) 
// rather it has multi-byte characters (e.g. UTF-8, UTF-16, etc.), therefore we should use mb_substr() instead.