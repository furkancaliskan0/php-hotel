<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Php Hotel</title>

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

    $filterParking = $_GET["parking"] ?? false;

    $filterVote = $_GET["vote"] ?? 0;
    ?>
</head>

<body>

    <form>
        <label for="parking">Parking</label>
        <input type="checkbox" name="parking" <?php
        if ($filterParking) {

            echo "checked";
        }
        ?>>
        <br>
        <label for="vote">Vote</label>
        <input type="text" name="vote" <?php
        if ($filterVote != 0) {

            echo "value='" . $filterVote . "'";
        }
        ?>>
        <br>
        <input type="submit" value="FILTER">
    </form>

    <br><br>

    <table class="table text-light bg-info rounded-3">
        <thead>
            <tr>
                <th scope="col">Nome Hotel</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza Centro</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($hotels as $hotel) {

                $name = $hotel["name"];
                $description = $hotel["description"];
                $parking = $hotel["parking"];
                $vote = $hotel["vote"];
                $distance = $hotel["distance_to_center"];

                if (
                    $vote >= $filterVote
                    && (!$filterParking
                        || ($filterParking && $parking)
                    )
                ) {

                    echo '<tr>'
                        . '<td>' . $name . '</td>'
                        . '<td>' . $description . '</td>'
                        . '<td>' . ("parking" ? "Disponibile" : "Non Disponibile") . '</td>'
                        . '<td>' . $vote . '</td>'
                        . '<td>' . $distance . ' km' . '</td>'
                        . '</tr>';

                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>