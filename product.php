<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Shop</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php

include 'database.php';

if (isset($_GET['id']))
{
	global $connection;

$id = $_GET["id"];
$query = "select * from products where product_id=$id";
$query_result = mysqli_query($connection, $query);

echo '<section class="p-5">
	<div class="container">
		<div class="row text-center g-4">';

	while ($row = mysqli_fetch_assoc($query_result))
	{
        echo '<div class="d-sm-flex align-items-center justify-content-between">';
		echo '<div class="col-md">
		<div class="card bg-secondary text-light">
			<div class="card-body text-center">
				<div class="h1 mb-3">';
					echo "<img width='250px' height='250px' src='image/products/{$row['picture']}'>";
				echo '</div>
				<h3 class="card-title mb-3">';
					echo $row['product_name'];
				echo '</h3>
				<p class="card-text">';
					echo 'قیمت: ' . number_format($row['price']) . 'T' . '<br>' . 'موجودی: ' . $row['amount']; 
				echo '</p>';
				if ($row['amount'] > 0)
				{
					echo "<form action='add_to_cart.php?id={$row['product_id']}' method='post'>
					<button name='btn_add_to_cart' type='submit' class='btn btn-success mb-2'>اضافه کردن به سبد</button>";
                    echo '<select name="amount" id="amount">';
                    for ($i = 1; $i <= $row['amount']; $i++)
                    {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    echo '</select>';
                    echo "</form>";
				}
				else
				{
					echo '<button name="btn_error" type="submit" class="btn btn-danger" disabled>این محصول ناموجود میباشد</button>';
				}
				echo '<div class="container py-2">';
				echo "<form action='index.php' method='post'>
				<button name='btn_product' type='submit' class='btn btn-warning'>بازگشت</button>
				</form>";
				echo '</div>';
				echo '</div>
			</div>
		</div>';
        echo '</div>';
	}
	echo '</div>
	</div>
</section>';
}
else
	header('location: notfound.html')
?>

</body>
</html>