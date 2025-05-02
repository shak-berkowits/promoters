<?php 
$encryption_id = $_SESSION['encryption_id'];
$id = $_SESSION['id'];

// Query to get lead counts
$query = "SELECT 
            COUNT(*) AS total_leads,
            SUM(CASE WHEN mobile_verify = 1 THEN 1 ELSE 0 END) AS verified_leads,
            SUM(CASE WHEN mobile_verify = 0 THEN 1 ELSE 0 END) AS unverified_leads,
            SUM(CASE WHEN hot_lead = 1  THEN 1 ELSE 0 END) AS hot_leads
          FROM promoters_lead 
          WHERE promoter_id = '$id'";

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