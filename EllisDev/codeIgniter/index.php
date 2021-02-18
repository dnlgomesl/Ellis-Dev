<?php
include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EllisDev</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="#" class="navbar-brand">EllisDev</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse flex-row-reverse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contato</a>
                    </li>
                </ul>
            </div>
    </nav>
    <div id="#slide_carrossel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="##slide_carrossel" data-slide-to="0" class="active"></li>
        <li data-target="##slide_carrossel" data-slide-to="1"></li>
        <li data-target="##slide_carrossel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="imagSlider">
        <?php
        $result_banners = "SELECT * FROM banners ORDER by titulo ASC";
        $resultado_banners = mysqli_query($conn, $result_banners);
        if(($resultado_banners) AND ($resultado_banners->num_rows != 0)) {
        ?>
            <div id="slide_carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $qtd = mysqli_num_rows($resultado_banners);
                    $cont = 0;
                    while($cont < $qtd){
                        echo "<li id='valor-car' data-target='#slide_carousel' data-slide-to='$cont'></li>";
                        $cont++;
                    }
                    ?>
 
                </ol>
                <div class="carousel-inner">
                    <?php
                    $cont_slide = 0;
                    while( $row_slide = mysqli_fetch_assoc($resultado_banners)){
                        $active = "";
                        if($cont_slide == 0){
                            $active = "active";
                        }
                        echo "<div class='carousel-item $active'>";
                        echo "<img class='d-block w-100' src='../banners/".$row_slide['arquivo']."' alt='First slide'>";
                        echo "</div>";
                        $cont_slide++;
                    }
                    ?>
          
                </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
                </div>
        <?php } ?>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>