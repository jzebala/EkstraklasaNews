<?php

include('../src/main.php');

if ( $results['status'] === 'ok' ) {
    // Success
    $results['articles'];
} else {
    // Error
    print_r($results);
}

?>
<!doctype html>
<html lang="pl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>EkstraklasaNews</title>
    </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
            <h1>Ekstraklasa News</h1>
            <p class="text-muted text-center" style="font-size: 13px;"><?php echo implode(", ", $ekstraklasa['teams']); ?></p>
            <hr>
            <?php
            $loop = 0;
            foreach ($results['articles'] as $article) {
                $loop++;
            ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="padding-bottom: 10px;"><?php echo $article['title'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $article['source']['name'] ?> &nbsp; 
                        <?php
                            if (date("d-m-Y", strtotime($article['publishedAt'])) === date("d-m-Y")) {
                                // Today
                                echo "<span class='badge badge badge-info'>" . date("d-m-Y", strtotime($article['publishedAt'])) . "</span>";
                            } 
                            else 
                            {
                                // Not today
                                echo "<span class='badge badge badge-warning'>" . date("d-m-Y", strtotime($article['publishedAt'])) . "</span>";
                            }
                        ?>
                        </h6>
                        <p class="card-text"><?php echo $article['description'] ?></p>
                        <hr>
                        <a href="<?php echo $article['url'] ?>" class="card-link">Przejdź do artykułu</a>
                    </div>
                </div> <!-- ./ card -->
                <br>
            <?php
            }
            ?>
            </div> <!-- ./ col -->
        <div> <!-- ./ row -->
    </div> <!-- ./ container -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>