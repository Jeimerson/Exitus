<nav id="navbar-top" class="navbar fixed-top col-12 col-lg-10 col-sm-12 col-md-10 ml-auto shadow-sm navbar-expand">

	<a class="navbar-brand bars-xs" href="#"><i class="fas fa-bars"></i></a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fas fa-bars"></i>
	</button>

	<div class="collapse navbar-collapse" id="navbarText">

		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="navbar-brand" id="bars" href="#"><i class="fas fa-bars"></i></a>
			</li>
		</ul>

		<a class="logo" href=""><img src="/assets/img/logo-completa.png" alt=""></a>

		<ul class="navbar-nav ml-auto d-flex align-items-center">

			</li>

			<li class="nav-item d-none d-md-block">
				<div class="">
					<img class="foto-perfil" src="/assets/img/adminProfilePhotos/<?= $_SESSION['Admin']['profilePhoto'] ?>" alt="" onerror="/assets/img/teacherProfilePhotos/foto-vazia.jpg">
				</div>
			</li>

			<li class="nav-item ml-3 d-none d-md-block">
				<b><?= $_SESSION['Admin']['name'] ?></b>
			</li>

			<li class="nav-item ml-4 mr-2">
				<a href="#"><a href="/admin/sair" data-toggle="tooltip" data-placement="bottom" title="Sair da conta"><i class="fas fa-sign-out-alt text-dark"></i></a></a>
			</li>

		</ul>
	</div>
</nav>