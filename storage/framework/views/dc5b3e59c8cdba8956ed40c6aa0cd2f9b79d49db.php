<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/error.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/500error.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed:100,200,300,400" rel="stylesheet">

</head>

<body class="loading">
  <h1>500 Internal Server Error</h1>
  <h2>Unfortunately we're having trouble loading the page you are looking for. Please come back in a while <b>:(</b></h2>
  <div class="gears">
    <div class="gear one">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <div class="gear two">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <div class="gear three">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

  <script type="text/javascript">
  $(function() {
    setTimeout(function(){
      $('body').removeClass('loading');
    }, 1000);
  });

  </script>
</body>
</html>
<?php /**PATH E:\IF\Semester 5\PBP\Laravel\SITPG\resources\views/errors/500.blade.php ENDPATH**/ ?>