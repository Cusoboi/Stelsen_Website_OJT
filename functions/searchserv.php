<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM servicetab WHERE BINARY CONCAT(UNIT_ID, S_PS, S_SRTYPE, S_SRNUMBER, S_SRDATE, S_PA, S_BN, S_UN, S_CN, S_PL, S_S) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM servicetab";
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