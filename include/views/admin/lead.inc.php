<style>
    .verified {
        /* background-color: green; */
        color: green;
        /* padding: 5px 10px;
        border-radius: 5px; */
        text-align: center;
        display: inline-block;
    }

    .unverified {
        /* background-color: red; */
        color: red;
        /* padding: 5px 10px;
        border-radius: 5px; */
        text-align: center;
        display: inline-block;
    }

    #signup {
        padding: 51px !important;
    }

    @media (max-width: 767px) {

        #signup,
        #reset-password {
            padding: 70px 0 !important;
        }
    }
</style>
<?php
$typeval = isset($_POST['filter']) ? $_POST['filter'] : 'all';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['promoter_id'])) {
    unset($_SESSION['promoter_id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['promoter_id'])) {
    $_SESSION['promoter_id'] = intval($_POST['promoter_id']);
}


$promoter_id = isset($_SESSION['promoter_id']) ? $_SESSION['promoter_id'] : 0;

$sql = "SELECT promoters_lead.*, 
               promoters_master.name AS promoter_name, 
               promoters_campaign.name AS campaign_name 
        FROM promoters_lead 
        LEFT JOIN promoters_master ON promoters_lead.promoter_id = promoters_master.id
        LEFT JOIN promoters_campaign ON promoters_lead.campaign_name = promoters_campaign.id";

$title = "Total Leads"; 
$conditions = []; 

if ($promoter_id > 0) {
    $conditions[] = "promoters_lead.promoter_id = $promoter_id";
}

if ($typeval === "verified") {
    $conditions[] = "promoters_lead.mobile_verify = 1";
    $title = "Verified Leads";
} elseif ($typeval === "unverified") {
    $conditions[] = "promoters_lead.mobile_verify = 0";
    $title = "Unverified Leads";
} elseif ($typeval === "hot") {
    $conditions[] = "promoters_lead.hot_lead = 1";
    $title = "Hot Leads";
}

if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

$sql .= " ORDER BY promoters_lead.id DESC";

$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $conn->error;
    exit;
}

// ✅ Check admin access
// $access = $_SESSION['access_token'] ?? '';
if (isset($_COOKIE['admin_auth']) && $_COOKIE['admin_auth'] == "1") {
?>



    <div class="container r-04 tab-pane active" id="leads" style="margin-top:150px; border: 1px solid #999999;">
        <h2 class="mt-2"><?= $title ?></h2>
        
        <div class="table-responsive">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Promoter Name</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Alternate No.</th>
                        <th>Verified</th>
                        <th>Concern Type</th>
                        <th>Gender</th>
                        <th>Campaign Name</th>
                        <th>Preferred Time</th>
                        <th>Hot Lead</th>
                        <th>Additional Comments</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Mobile verification status
                            $verificationStatus = $row['mobile_verify'] ? "<span class='verified'>Verified</span>" : "<span class='unverified'>Unverified</span>";

                            // Hot lead status
                            $hotLead = $row['hot_lead'] ? "Yes" : "No";

                            echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['promoter_name']}</td> <!-- Displaying promoter name instead of ID -->
                        <td>{$row['first_name']} {$row['last_name']}</td>
                        <td>{$row['mobile_number']}</td>
                        <td>{$row['alternate_number']}</td>
                        <td>{$verificationStatus}</td>
                        <td>{$row['concern_type']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['campaign_name']}</td>
                        <td>{$row['prefer_time']}</td>
                        <td>{$hotLead}</td>
                        <td>{$row['additional_comment']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['created_at']}</td>
                      </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='13'>No records found</td></tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
} else {
    echo "<script>window.location.href = '" . BASE_URL . "admin/login';</script>";
    exit;
}
?>
<script>
    // let table = new DataTable('#myTable');
    new DataTable('#myTable', {
        responsive: true,
        order: []
    });
</script>