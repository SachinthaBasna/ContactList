<?php
include "connection.php";

$rs = Database::search("SELECT * FROM `contacts` ORDER BY `name`");
$num = $rs->num_rows;



?>
<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Contact List</title>
</head>

<body>



    <div class="container mt-5 col-12 d-flex justify-content-center">
        <div class="col-10 row d-flex justify-content-center gap-2">
            <h2 class="text-center fw-bold">Add new contact </h2>
            <div class="col-auto">
                <input type="text" id="name" class="form-control" placeholder="Name" />
            </div>

            <div class="col-auto">
                <input type="text" id="mobile" class="form-control" placeholder="Mobile" />
            </div>

            <div class="col-auto">
                <input type="email" id="email" class="form-control" placeholder="email" />
            </div>

            <div class="col-auto">
                <button class="btn btn-primary" onclick="addContact();">Add Contact</button>
            </div>

            <div class="row justify-content-center">
                <div class="col-8">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search Name or mobile Number"
                        aria-label="Search" id="search">
                </div>

                <div class="col-auto">
                    <button class="btn btn-success" onclick="searchContact();">Search</button>
                </div>
            </div>


            <div id="contact-wrapper">
                <div class="row mt-2">
                    <p><?php echo ($num); ?> Contacts found</p>
                </div>
                <?php

                for ($i = 0; $i < $num; $i++) {
                    $d = $rs->fetch_assoc();

                    ?>
                    <div class="mt-2">
                        <div class="card">
                            <div class="star" onclick="star(this, <?php echo $d['id'] ?>);">
                                <i class="fa-solid fa-star" id="favIcon"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo ($d['name']) ?></h5>
                                <p class="card-text"><?php echo ($d['email']) ?></p>
                                <p class="card-text"><?php echo ($d['phone']) ?></p>
                                <a href="#" class="btn btn-danger btn-sm"
                                    onclick="deleteContact(<?php echo $d['id'] ?>)">Delete
                                    Contact</a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
        </div>

        <script src="script.js"></script>
</body>

</html>