<?php
    // Fetch all promoters
    $query = "SELECT * FROM promoters_master ORDER BY id ASC";
    $promoterResult = $conn->query($query);
    
    $access = $_SESSION['access_token'];
    if ($access == ADMIN_ACCESS_CODE ) {

?>
<div class="container r-04 tab-pane" id="promoters" style="margin-top:150px; border: 1px solid #999999;">
    <h2 class="mt-2">Total Promoter</h2>
    <div class="table-responsive">
        <table id="promotersTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($promoterResult->num_rows > 0) {
                    while ($row = $promoterResult->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>
                                    <form action='lead' method='POST'>
                                        <input type='hidden' name='promoter_id' value='{$row['id']}'>
                                        <button type='submit' class='btn btn-link p-0' style='border: none; background: none; color: blue; text-decoration: underline; cursor: pointer;'>
                                            {$row['name']}
                                        </button>
                                    </form>
                                </td> 
                                <td>{$row['phone']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['created_at']}</td>
                                <td>{$row['updated_at']}</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
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
    new DataTable('#promotersTable', {
        responsive: true,
        order: []
    });
</script>
