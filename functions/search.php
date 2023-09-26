<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM subject WHERE BINARY CONCAT(USER_ID, PM_PS, PM_SRTYPE, PM_SRNUMBER, PM_SRDATE, PM_PA, PM_BN, PM_UN, PM_CN, PM_PL, PM_MOP, CONTRACT, REMARKS) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM subject";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "stelsendb");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>