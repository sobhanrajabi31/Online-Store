<?php

include 'database.php';

?>

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
    <link rel="stylesheet" href="cart.css">
    <title>Shop</title>
</head>
<body style="background-color: #eee;">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<section class="py-3 py-md-5">
	<div class="container">
	  <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
		<div class="col-12 col-lg-6 col-xl-5">
		  <img class="img-fluid rounded" loading="lazy" src="image/about-us.png">
		</div>
		<div class="col-12 col-lg-6 col-xl-7">
		  <div class="row justify-content-xl-center">
			<div class="col-12 col-xl-11">
			  <h2 class="mb-3">درباره ما</h2>
			  <p class="lead fs-4 text-secondary mb-3">فروشگاهی متفاوت، هوشمند، زیبا و کاربر پسند...</p>
			  <p class="mb-3">هر آنچه برای خود و خانواده خود نیاز دارید در این فروشگاه یافت می شود.</p>
			  <p class="mb-4"><a class="nav-link" href="index.php">بازگشت به صفحه اصلی</a></p>
			  <div class="row gy-4 gy-md-0 gx-xxl-5X">
				<div class="col-12 col-md-6">
				  <div class="d-flex">
					<div class="me-4 text-primary">
					  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
						<path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
					  </svg>
					</div>
					<div>
					  <h2 class="h4 mb-3">مدیریت هوشمند</h2>
					  <p class="text-secondary mb-0">مدیریت همزمان مشتریان، محصولات و سفارش ها.</p>
					</div>
				  </div>
				</div>
				<div class="col-12 col-md-6">
				  <div class="d-flex">
					<div class="me-4 text-primary">
					  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
						<path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
					  </svg>
					</div>
					<div>
					  <h2 class="h4 mb-3">تخفیفات ویژه</h2>
					  <p class="text-secondary mb-0">به مناسبت های مختلف، تخفیفاتی برای محصولات در نظر گرفته می شود</p>
					</div>
				  </div>
				</div>
				<div class="col-12 col-md-6">
					<div class="d-flex">
					  <div class="me-4 text-primary">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
							<path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
						</svg>
					  </div>
					  <div>
						<h2 class="h4 mb-3">ارسال رایگان</h2>
						<p class="text-secondary mb-0">برای شهر های خاصی ارسال رایگان تعیین می شود.</p>
					  </div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="d-flex">
					  <div class="me-4 text-primary">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
							<path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
							<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
							<path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
						</svg>
					  </div>
					  <div>
						<h2 class="h4 mb-3">قیمت مناسب</h2>
						<p class="text-secondary mb-0">محصولات ما با پایین ترین قیمت نسبت به دیگر فروشگاه ها فروخته می شوند.</p>
					  </div>
					</div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
</section>

<section class="bg-light py-3 py-md-5">
	<div class="container">
	  <div class="row justify-content-md-center">
		<div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
		  <h2 class="mb-4 display-5 text-center">تماس با ما</h2>
		  <p class="text-secondary mb-5 text-center">نظرات، انتقادات و پیشنهادات خود را از طریق فرم زیر برای ما ارسال کنید.</p>
		  <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
		</div>
	  </div>
	</div>

	<div class="container">
	  <div class="row justify-content-lg-center">
		<div class="col-12 col-lg-9">
		  <div class="bg-white border rounded shadow-sm overflow-hidden">
		  	<?php 

			if (isset($_SESSION['startup']))
			{
				if ($_SESSION['alert_contact_sent'])
				{
					$_SESSION['alert_contact_sent'] = false;
					echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
					پیام شما برای ما ارسال شد.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
				}
			}
			
			?>
			<form action="contact-us.php" method="post">
			  <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
				<div class="col-12">
				  <label for="username" class="form-label">نام و نام خانوادگی <span class="text-danger">*</span></label>
				  <input type="text" class="form-control" maxlength="100" name="username" required>
				</div>
				<div class="col-12 col-md-6">
				  <label for="email" class="form-label">ایمیل <span class="text-danger">*</span></label>
				  <div class="input-group">
					<span class="input-group-text">
					  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
						<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
					  </svg>
					</span>
					<input type="email" maxlength="100" class="form-control" name="email" required>
				  </div>
				</div>
				<div class="col-12 col-md-6">
				  <label for="telephone" class="form-label">شماره تلفن</label>
				  <div class="input-group">
					<span class="input-group-text">
					  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
						<path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
					  </svg>
					</span>
					<input type="tel" maxlength="11" class="form-control" name="telephone" value="">
				  </div>
				</div>
				<div class="col-12">
				  <label for="message" class="form-label">پیام <span class="text-danger">*</span></label>
				  <textarea class="form-control" name="message" rows="3" required></textarea>
				</div>
				<div class="col-12">
				  <div class="d-grid">
					<button class="btn btn-primary btn-lg" name="btn_contact" type="submit">ثبت پیام</button>
				  </div>
				</div>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	</div>
</section>

<div class="text-center">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18906.129712753736!2d6.722624160288201!3d60.12672284414915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x463e997b1b6fc09d%3A0x6ee05405ec78a692!2sJ%C4%99zyk%20trola!5e0!3m2!1spl!2spl!4v1672239918130!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

</body>
</html>