<?php
$name =  "Cengiz Efe";
$surname = "Korkmazer";
$integer1 = "19";
$float1 = "13.2";
$boolean = true;

echo "$name $surname <br>";

echo $integer1 + $float1 . "<br>" ;

echo $name . $surname . "<br>";


if($integer1 == 19 && $float1 == 13.2 ){
    echo "Sum of this 2 number is = " . $integer1 + $float1 . " <br><br> ";
}
else{
    echo " Unknown ";  
}
?>



<html>
    <body>
        <form action="index.php" method="get">
        <label for="age">Your age:</label><br>
        <input type="text" id="age" name="age"><br>
        <label for="multiply"> Number to Multiply:</label><br>
        <input type="text" id="multiply" name="multiply"><br>
        
        <label for="edge1">First edge of Rectangle:</label><br>
        <input type="text" id="edge1" name="edge1"><br>
        <label for="edge2"> Second edge of Rectangle:</label><br>
        <input type="text" id="edge2" name="edge2"><br>
        <input type="submit" value="Submit">
        </form>
    </body>
</html>







<?php
echo  $_GET["age"];

if($_GET["age"] >= 65){
    echo " You are Senior <br><br>";
}
else if($_GET["age"] < 65 && $_GET["age"] >= 18){
    echo " You are Adult <br><br>";
}
else{
    echo " You are minor <br><br>";
}



for($i = 0; $i<10; $i++){
    
    echo $_GET["multiply"] . " * " . $i . " = " . $_GET["multiply"]*$i . "<br>";

}

$factorial1 = 1;
$factorial2 = 1;

while($factorial1 <= $_GET["multiply"]){
    $factorial2 *= $factorial1;
    $factorial1++;
}
echo "<br> Factorial of ". $_GET["multiply"] . " = " . $factorial2 . "<br><br>";








function Rectangle($edge1,$edge2){

$edge1 = $_GET["edge1"];
$edge2 = $_GET["edge2"];

$area = $edge1 * $edge2;

echo "Area of your rectangle is =  " . $area ."<br><br>";
}

Rectangle($_GET["edge1"],$_GET["edge2"]);






$names = array(" Ahmet "," Mehmet "," Cengiz "," Kemal ");

sort($names);

echo "Alphabetical Sort : ";
for($i= 0; $i<sizeof($names) ; $i++){
    echo $names[$i] ;
}
echo "<br><br>";






$String = "muvaffakatname";

$String = strtoupper($String);
$String = strrev($String);

$Vowels = substr_count($String, 'A')+substr_count($String, 'E')+
substr_count($String, 'I')+substr_count($String, 'O')+substr_count($String, 'U');

echo $String . " has " . $Vowels .  " Vowels <br><br>";







require 'Books.php';

echo $Book->showDetails();
echo $Ebook->eShowDetails();








try {
    $fileopen = fopen("xd.txt", "x");

    if ($fileopen === false) {
        throw new Exception();
    }

    fclose($fileopen);

} catch (Exception $e) {
    echo "Error: File not found ";
}
?>