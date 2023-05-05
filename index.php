<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

if (isset($_GET["parking"])) {
    $filter = $_GET["parking"];
} else {
    $filter = "";
};

if (isset($_GET["vote"])) {
    $votes = $_GET["vote"];
} else {
    $votes = "";
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking.Boolean</title>
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        <h1>Boolean x Booking</h1>
        <form action="index.php" method="GET">
            <div class="row">
                <div class="col">
                    <label for="parking">Ti serve il parcheggio?</label>
                    <select class="form-select" name="parking" id="parking">
                        <option value="">Tutti</option>
                        <option value="true">Si</option>
                        <option value="false">No</option>
                    </select>
                </div>
                <div class="col">
                    <label for="vote">Con quale volutazione lo cerchi?</label>
                    <select class="form-select" name="vote" id="votes">
                        <option value="">All</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>



                <!-- <div class="col">
                    <label for="parking">Ti serve il parcheggio?</label>
                    <select class="form-select" name="parking" id="parking">
                        <option value="">Tutti</option>
                        <option value="true">Si</option>
                        <option value="false">No</option>
                    </select>
                </div> -->
                <!-- <div class="col">
                    <label for="vote">Con quale volutazione lo cerchi?</label>
                    <select class="form-select" nome="vote" id="vote">
                        <option value="">All</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div> -->

                <div>
                    <button type="submit">Cerca</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) {
                    if (($filter === "" || ($filter === "true" && $hotel["parking"] === true) || ($filter === "false" && $hotel["parking"] === false)) && ($votes === "" || $hotel["vote"] >= $votes)) {
                ?>

                        <tr>
                            <th scope="row"><?php echo $hotel["name"]; ?></th>
                            <td><?php echo $hotel["description"]; ?></td>
                            <td><?php if ($hotel["parking"]) { ?>
                                    Si
                                <?php } else { ?>
                                    No
                                <?php } ?>
                            </td>
                            <td><?php echo $hotel["vote"]; ?></td>
                            <td><?php echo $hotel["distance_to_center"]; ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>