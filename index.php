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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <p class="navbar-brand nav-link">فروشگاه آنلاین</p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex">
            <input class="form-control me-2" maxlength="100" onkeyup="live_search()" id="search_bar" type="search" placeholder="جستجو" aria-label="جستجو">
		</div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item py-2">
                    <a href="aboutus.php" class="btn btn-light">درباره ما</a>
                </li>
                <?php
                include 'database.php';
                if (!isset($_SESSION['telephone']))
                {
                    echo '<li class="nav-item py-2">
                    <form action="login.php" method="post">
                        <button class="btn btn-light"><i class="bi bi-box-arrow-in-left"></i> ورود | ثبت نام</button>
                    </form>
                </li>';
                }
                else
                {
                    echo '<div class="container">';
                    echo '<li class="nav-item dropdown py-2">
                    <button class="btn btn-light nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="image/users/person.svg" width="24px" height="24px" alt="">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                    $display_name = "";
                    if (empty($_SESSION['display_name']))
                        $display_name = "کاربر";
                    else
                        $display_name = $_SESSION['display_name'];
                    echo '<li><a class="dropdown-item" href="profile_page.php">'.$display_name.'</a></li>';

                    if ($_SESSION['access'] > 0)
                        echo '<li><a class="dropdown-item" href="management">مدیریت</a></li>';

                    echo '<li><a class="dropdown-item" href="logout.php?access=logout">خروج از حساب کاربری</a></li>';

                    echo '</ul>';
                    echo '</li>';
                    echo '</div>';

                    echo '<li class="nav-item py-2">
                    <form action="cart.php" method="post">
                    <button class="btn btn-light"><img src="image/cart.svg" width="24px" height="24px" alt=""></button>
                    </form>
                </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<?php

if (isset($_SESSION['startup']))
{
    if ($_SESSION['alert_delete_account'])
    {
        $_SESSION['alert_delete_account'] = false;
        echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        حساب شما با موفقیت حذف شد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?>

<section class="p-5">
	<div class="container col-sm">
		<div class="row text-center g-4">
			<?php
				global $connection;

				echo '<ul id="products">';
				
				$query = "select * from products where status=1 and amount > 0";
				$query_result = mysqli_query($connection, $query);

                if (mysqli_num_rows($query_result) > 0)

				{
                    while ($row = mysqli_fetch_assoc($query_result))
                    {
                        echo '<li>';
                        echo '<a class="nav-link" href="product.php?id='.$row["product_id"].'">';
                        echo '<div class="col-md">';
                        echo '<div class="card bg-secondary text-light">';
                        echo '<div class="card-body text-center">';
                        echo '<div class="h1 mb-3">';
                        echo '<img width="50px" height="50px" src="image/products/'.$row['picture'].'">';
                        echo '</div>';
                        echo '<h3 class="card-title mb-3">';
                        echo $row['product_name'];                 
                        echo '</h3>';
                        echo '<p class="card-text">';
                        echo number_format($row['price']) . "T"; 
                        echo '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                        echo '</li>';
                    }
                }
                else
                echo "<div class='container text-center align-items-center justify-content-between'><h1>محصولی برای نمایش وجود ندارد</h1></div>";

				echo '</ul>';
			?>
		</div>
	</div>
</session>

<script>
function live_search() {

  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('search_bar');
  filter = input.value.toUpperCase();
  ul = document.getElementById("products");
  li = ul.getElementsByTagName('li');

  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>

</body>
</html>
