<?php

$inputName = isset($_Gret['input_name']) ? 
$_GET['input_name'] : "Guest";


$marks =array(40,50,60,70,80,90);

function calculateAverage($arr) 
{
  $total = 0;
  foreach($arr as $value)
    {
      $total += $value;
    }
    $average = (float)$total / count($arr);
    return $average;
}

function checkResult($mark)
{
  if ($mark >= 50)
    {
      return "passed";
    }
    else
      {
        return "Failed";
      }

}
echo "<h2>Students Marks Report</h2>";
echo "<p>Input Name From URL: </p>" . htmlspecialchars($inputName);

echo "<h3>Students marks: </h3>";
foreach($marks as $index => $mark)
  {
    echo "Student " . ($index + 1) . ": " . $mark . " (" . checkResult($mark)
    . ")<br>"
    }

$total = 0;
$max = $marks[0];
$min = $marks[0];
$passCount = 0;
$failCount = 0;

foreach ($marks as $mark)
{
    $total += $mark;

    if ($mark > $max) 
    {
      $max = $mark;
    }

    if ($mark < $min) 
    {
      $min = $mark;
    }

    if ($mark >= 50) 
    {
      $passCount++;
    } 
    else 
    {
      $failCount++;
    }
}

$average = calculateAverage($marks);
$totalStudents = count($marks);

echo "<h3>Statistics:</h3>";
echo "Total Marks: " . $total . "<br>";
echo "Average Marks: " . $average . "<br>";
echo "Maximum Marks: " . $max . "<br>";
echo "Minimum Marks: " . $min . "<br>";
echo "Total Students: " . $totalStudents . "<br>";
echo "Passed Students: " . $passCount . "<br>";
echo "Failed Students: " . $failCount . "<br>";


$studentDetails = array(
    "name" => "Md. Tanvir Islam Shishir",
    "id" => "23-53454-3",
    "cgpa" => 3.50
);
$upperName = strtoupper($studentDetails["name"]);
$nameLength = strlen($studentDetails["name"]);

echo "<h3>Student Details:</h3>";
foreach ($studentDetails as $key => $value) 
{
  echo ucfirst($key) . ": " . $value . "<br>";
}


echo "<h3>String Operations:</h3>";
echo "Name in Uppercase: " . $upperName . "<br>";
echo "Length of Name: " . $nameLength . "<br>";

$sortedMarks = $marks;
sort($sortedMarks);

echo "<h3>Sorted Marks (Ascending):</h3>";
foreach ($sortedMarks as $value) {
    echo $value . " ";
}
?>