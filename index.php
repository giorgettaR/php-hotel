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

    $parking = $_GET['parking'] ?? 'off';
    $vote = $_GET['vote'] ?? 'off';

    $visible_hotels = $hotels;

    if ($parking == 'on') {
        $visible_hotels = array_filter($hotels, fn($hotel) => $hotel['parking']);
    };

    if (is_numeric($vote)) {
        if ($vote > 0 && $vote <= 5) {
            $visible_hotels = array_filter($hotels, fn($hotel) => $hotel['vote'] <= $vote);
        } else $vote = 'not valid';
    } else $vote = 'Filtro non valido';

    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>php-hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="" method="GET">
                    <p>
                        <label for="parking_filter">Filtra per parcheggio</label>
                        <input name="parking" type="checkbox" id="parking_filter">
                    </p>
                    <p>
                        <label for="vote_filter">Filtra per voto</label>
                        <input name="vote" type="text" id="vote_filter" checked>
                    </p>
                    <p>
                        <button>Filtra</button>
                    </p>
                </form>
            </div>
            <div class="col-4">
                <h1>Filtri Attivi</h1>
                <p> Parcheggio:
                    <?php if ($parking == 'on') {
                        echo $parking;
                    } else echo 'off'; ?>
                </p>
                <p> Voto:
                    <?php  echo $vote; ?>
                </p>
            </div>
        </div>
        <div class="row">
            
            <?php foreach ($visible_hotels as $hotel) { ?>
                <div class="col-4">
                    <div class="card p-2 mt-2 border border-dark">
                        <h4> <?php echo $hotel['name']; ?></h4>
                        <p> <?php echo $hotel['description']; ?></p>
                        <h5> Parcehggio
                            <?php if($hotel['parking']){
                            echo "Sì";
                            } else {
                            echo "NO";
                            }  ?>
                        </h5>
                        <h5> Voto <?php echo $hotel['vote']; ?> </h5> 
                        <h5> Distanza dal Centro <?php echo $hotel['distance_to_center']; ?> Km</h5> 
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
    
</body>
</html>

                        <!-- echo $hotel['description'];
                        echo $hotel['parking'];
                        echo $hotel['vote'];
                        echo $hotel['distance_to_center'];
                        var_dump($hotel); -->