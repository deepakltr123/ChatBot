<?php
date_default_timezone_set('Asia/Kolkata');
include('database.inc.php');

// Get the user input from the AJAX request
$txt = mysqli_real_escape_string($con, $_POST['txt']);

// Check if the query is related to "deadline"
$isDeadlineQuery = stripos($txt, 'deadline') !== false;
$NEST2023CompleteCrashCourse = stripos($txt, 'NEST 2023 Complete Crash Course') !== false;
$IATRescueCourse = stripos($txt, 'IAT Rescue Course') !== false;
$NESTRescueCourse = stripos($txt, ' NEST Rescue Course') !== false;
$IAT2023CompleteCrashCourse = stripos($txt, 'IAT 2023 Complete Crash Course') !== false;
// $Exam1 = stripos($txt, 'exam1') !== false;
// $Exam1 = stripos($txt, 'exam1') !== false;
// $Exam1 = stripos($txt, 'exam1') !== false;
if ($isDeadlineQuery) {
  // If it's a deadline-related query, provide a specific response
//   $html = "The application form deadline for the Course :<br>";
//   var_dump($html);
  if($NEST2023CompleteCrashCourse )
  {
        $html= "The application form deadline for the NEST 2023 Complete Crash Course :<br>";
    $html .= "- June 30, 2023<br>";

    
  }
  else if($IATRescueCourse )
  {
        $html= "The application form deadline for the IAT Rescue Course :<br>";
    $html .= "- July 30, 2023<br>";

    
  }
  else if($NESTRescueCourse )
  {
        $html= "The application form deadline for the NEST Rescue Course :<br>";
    $html .= "- August 30, 2023<br>";

    
  }
  else if($IAT2023CompleteCrashCourse)
  {
        $html= "The application form deadline for the IAT 2023 Complete Crash Course :<br>";
    $html .= "- sept 30, 2023<br>";

    
  }
 

    
  
//   $html .= "- Exam 2: July 15, 2023<br>";
//   $html .= "- Exam 3: August 10, 2023<br>";
} else {
  // For other queries, provide a generic response
  $html = "I'm sorry, I couldn't understand your query. Could you please rephrase it?";
}

// Save the user message to the database
$added_on = date('Y-m-d H:i:s');
mysqli_query($con, "INSERT INTO message (message, added_on, type) VALUES ('$txt', '$added_on', 'user')");

// Save the bot reply to the database
$added_on = date('Y-m-d H:i:s');

mysqli_query($con, "INSERT INTO message (message, added_on, type) VALUES ('$html', '$added_on', 'bot')");

// Prepare the response as JSON
$response = array(
  'html' => $html,
  'pageLink' => '' // This can be populated with a specific page link if needed
);

// Send the JSON response
echo json_encode($response);
?> 
