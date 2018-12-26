<!--Este codigo serve apanas pra testar o pdf-->


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.btn {
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}

.success {background-color: #4CAF50;} /* Green */
.success:hover {background-color: #46a049;}
</style>
</head>
<body>

<h1>Alert Buttons</h1>

<button onclick= "go()" class="btn success">Success</button>

<script>
function go() {
  window.location.href="cpdf.php";
}
</script>

</body>
</html>