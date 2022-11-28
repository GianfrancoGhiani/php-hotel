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
$parking = (isset($_GET['parking']) ? $_GET['parking'] : '');
$hotelsView = [];
if (isset($parking) && !empty($parking)) {
    // echo strval($parking);
    $parkReq = filter_var($parking, FILTER_VALIDATE_BOOLEAN);
    foreach ($hotels as $hotel) {
        if (filter_var($hotel['parking'], FILTER_VALIDATE_BOOLEAN) == filter_var($parking, FILTER_VALIDATE_BOOLEAN)) {
            $hotelsView[] = $hotel;
        }
    }
} else {

    $hotelsView = $hotels;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hotels</title>
</head>

<body>
    <div class="m-auto  w-50">
        <form action="index.php" method="GET">
            <h3 class="d-inline-block">Cerchi un posto con parcheggio?</h3>
            <select name="parking" id="parking">
                <option value="" selected>Tutti</option>
                <option value="true"> si</i></option>
                <option value="false"> no</i></option>
            </select>
            <button type="submit" class="border-0 rounded-pill ">Cerca</button>
        </form>
        <table class="my-5 m-auto w-75">
            <thead class="text-center">
                <tr>
                    <?php foreach ($hotels[0] as $key => $value) { ?>
                    <th class="text-capitalize p-2">
                        <?php echo str_replace('_', ' ', $key) ?>
                    </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($hotelsView as $hotel) { ?>
                <tr>
                    <?php foreach ($hotel as $key => $value) { ?>
                    <td <?php echo 'class=' . (!is_string($hotel[$key]) ? ("text-center") : 'p-2') ?>>
                        <?php echo (is_bool($hotel[$key]) ? 
                            ($hotel[$key] === true ? '<i class="fa-solid fa-check"></i>' : '<i class="fa-solid fa-xmark"></i>')
                            : $value) ?>
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</body>

</html>