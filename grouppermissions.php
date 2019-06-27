<?php
// Use this code snippet to check if currently logged in supervisor has permissions for selected user (by group)
// Remember to declare variable userID before including this

$supervisorID = $_SESSION['logged_in_user']->userID;
$userID = $_POST['userID'];

$accesstogroup = false;
$query = tc_query("SELECT userID
                    FROM employees
                    WHERE userID = '$userID' AND groupID IN (
                        SELECT groupID
                        FROM supervises
                        WHERE userID = '$supervisorID'
                        )
                    AND level = 0;");
if ($query != FALSE){
    $checkgroup = mysqli_fetch_row($query);
}
if (!empty($checkgroup)) {$accesstogroup = true;}
if ($_SESSION['logged_in_user']->level >= 3) {$accesstogroup = true;} // admin has permissions to every group

// Block access to rest of the page in case superivsor doesn't have access to this group
if (!$accesstogroup) {
    echo '<h2>Virhe! Sinulla ei ole pääsyä tämän henkilön tietoihin</h2>';
    exit;
}

?>