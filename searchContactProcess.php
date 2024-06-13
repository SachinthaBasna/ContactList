<?php
include "connection.php";
$search = $_POST['s'];

$rs = Database::search("SELECT * FROM `contacts` WHERE `name` LIKE '%" . $search . "%'");
$num = $rs->num_rows;
?>
<div class="row mt-2">
    <p><?php echo ($num); ?> Contacts found</p>
</div>

<?php
for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();

    ?>
    <div class="mt-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-bold"><?php echo ($d['name']) ?></h5>
                <p class="card-text"><?php echo ($d['email']) ?></p>
                <p class="card-text"><?php echo ($d['phone']) ?></p>
                <a href="#" class="btn btn-danger btn-sm" onclick="deleteContact(<?php echo $d['id'] ?>)">Delete
                    Contact</a>
            </div>
        </div>
    </div>
    <?php
}
?>