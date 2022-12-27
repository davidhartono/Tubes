<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 Swal.fire({
  icon: 'error',
  title: 'Belum Login',
  text: 'Anda harus Login terlebih dahulu',
}).then(function() {
				window.location = "../login/login.php";
			})
</script>
</body>

</html>