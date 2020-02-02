<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profil</title>
	<link href="<?= base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/checkout.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/profil.css">
</head>

<body>
	<section class="wn__checkout__area section-padding--lg">
		<div class="container">
			<div class="row mb-3">
				<h1 style="width: 100%; text-align: center;">User Profile</h1>
			</div>
			<?= $this->session->flashdata('terbeli'); ?>
			<div class="row">
				<div class="col-lg-5 col-12">
					<div class="wn__order__box">
						<ul style="margin-bottom: -30px !important;" class="shipping__method">
							<div class="img-profil mt-3">
								<img src="<?= base_url(); ?>assets/img/user.png" alt="">
							</div>
						</ul>

						<ul class="shipping__method text-center">
							<h2 style="margin-bottom: 0 !important;">
								<?= $_SESSION['nama_user']; ?>
							</h2>
							<span><?= $_SESSION['email']; ?></span>
						</ul>
						<ul class="shipping__method">
							<li>Alamat</li>
							<li>Telepon</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-7 col-12 md-mt-40 sm-mt-40">
					<div class="customer_details">
						<div class="row beli  mt-5">
							<a type="button" href="<?= base_url('home/home') ?>"
								class="btn btn-success bg-success">Lanjut
								Belanja</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>
