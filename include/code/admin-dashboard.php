<?php 
$access = $_SESSION['access_token'];

// Query to get lead counts from the updated table `promoters_lead`
$query = "SELECT 
            COUNT(*) AS total_leads,
            SUM(CASE WHEN mobile_verify = 1 THEN 1 ELSE 0 END) AS verified_leads,
            SUM(CASE WHEN mobile_verify = 0 THEN 1 ELSE 0 END) AS unverified_leads,
            SUM(CASE WHEN hot_lead = 1  THEN 1 ELSE 0 END) AS hot_leads
          FROM promoters_lead";  // Updated table name

// Query to count total promoters from the updated table `promoters_master`
$data = "SELECT COUNT(*) AS total_promoter FROM promoters_master ORDER BY id DESC";  // Updated table name

$resultData = mysqli_query($conn, $data);
if ($resultData) {
    $rowData = mysqli_fetch_assoc($resultData);
    $total_promoter = $rowData['total_promoter'];
} else {
    echo "Error: " . mysqli_error($conn);
}

$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);

    // Fetch the values
    $total_leads = $row['total_leads'];
    $verified_leads = $row['verified_leads'];
    $unverified_leads = $row['unverified_leads'];
    $hot_leads = $row['hot_leads'];
} else {
    echo "Error: " . mysqli_error($conn);
}
?>