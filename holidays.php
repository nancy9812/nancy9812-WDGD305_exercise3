<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Nancy Ma">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Holidays in 2021</title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
  <?php
  // connect to holiday database
  $connect = mysqli_connect('localhost', 'rootuser', 'rootpassword', 'holiday');
  $query = 'SELECT id,name,day,date,image,description FROM holidays';
  $result = mysqli_query($connect, $query);

  echo '<h1>Holidays in 2021</h1>';

  // check if connected to database and print to console
  if ($connect == false) {
    echo "<script>console.log('Aw Man Can't Connect')</script>";
  } else {
    echo '<script>console.log("Yay Connected")</script>';
  }

  echo '<div class="container">';
  while ($record = mysqli_fetch_assoc($result)) {

    // convert number date to text month and day
    $date = strtotime($record['date']);

    echo '<div class="holiday">';
    echo '<h2>' . $record['name'] . '</h2>';
    echo '<h3>' . $record['day'] . ', ' . date("F jS", $date) . '</h3>';
    echo '<img src="' . $record['image'] . '" alt="' . $record['name'] . '">';
    echo '<p>' . $record['description'] . '</p>';
    echo '</div>';
  }
  echo '</div>'
  ?>
</body>

</html>