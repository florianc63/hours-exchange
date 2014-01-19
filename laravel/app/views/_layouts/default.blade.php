<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8" />

	<title> 

		@section('title') 

		@show 

	</title>



	<meta name="viewport" content="width=device-width, initial-scale=1.0">



	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">

	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato"> 	



	<style>

	@section('styles')

		

	@show

	</style>



	<script src="http://code.jquery.com/jquery.js"></script>

	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

	<script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>

	<script src="{{ asset('assets/plugins/ckeditor/adapters/jquery.js') }}"></script>

	<script src="{{ asset('assets/js/main.js') }}"></script>	



	<script>

		UPLOADCARE_PUBLIC_KEY = '784913f134547d53710b';

	</script>

	

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">

	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">

	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">

	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">

	<link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

	

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->

	<!--[if lt IE 9]>

	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

	<![endif]-->





</head>



<body>



<div class="top-head">

	<div class="wrapper">

		<div class="row">

			<div class="col-lg-12">

				<div class="row">

					<div class="col-lg-1">

						<img src="{{ asset('assets/img/hx-logo-small.png') }}" />

					</div>

					<div class="col-lg-6 top-bar">

						<input class="top-bar-input" type="text" value="Search..." />

						<button class="top-bar-search" type="submit">

							<span class="glyphicon glyphicon-search"></span>

						</button>

					</div>

					<div class="col-lg-5">

						@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))

							<div class="admin-box-top">

								<strong>Hour Exchange Admin</strong>

								<ul class="default-menu">

									<li {{ (Request::is('admin/users*') ? 'class="active"' : '') }}><a href="{{ URL::to('/admin/users') }}"><span class="glyphicon glyphicon-chevron-right"></span>Users</a></li>

									<li {{ (Request::is('admin/groups*') ? 'class="active"' : '') }}><a href="{{ URL::to('/admin/groups') }}"><span class="glyphicon glyphicon-chevron-right"></span>Groups</a></li>

									<li {{ (Request::is('admin/pages*') ? 'class="active"' : '') }}><a href="{{ URL::to('/admin/pages') }}"><span class="glyphicon glyphicon-chevron-right"></span>Pages</a></li>

									<li {{ (Request::is('admin/services*') ? 'class="active"' : '') }}><a href="{{ URL::to('/admin/services') }}"><span class="glyphicon glyphicon-chevron-right"></span>Services</a></li>

								<!--	

									<li {{ (Request::is('admin/skillscategories*') ? 'class="active"' : '') }}><a href="{{ URL::to('/admin/skillscategories') }}"><span class="glyphicon glyphicon-chevron-right"></span>Categories (Skills)</a></li>

									<li {{ (Request::is('admin/skills*') && ! Request::is('admin/skillscategories*') ? 'class="active"' : '') }}><a href="{{ URL::to('/admin/skills') }}"><span class="glyphicon glyphicon-chevron-right"></span>Skills</a></li>

								-->

								</ul>

							</div>

						@elseif (Sentry::check() && Sentry::getUser()->inGroup(Sentry::findGroupByName('Member')))

							<div class="admin-box-top">

								<strong>Your account</strong>

								<ul class="default-menu">

									<li {{ (Request::is('admin/userdetails*') ? 'class="active"' : '') }}>

										<a href="{{ route('admin.userdetails.edit', 

										User::find(Sentry::getUser()->id)->details->id) }}"><span class="glyphicon glyphicon-chevron-right"></span>Member details</a>

									</li>	

									<li {{ (Request::is('admin/offers*') ? 'class="active"' : '') }}><a href="{{ URL::to('/admin/offers') }}"><span class="glyphicon glyphicon-chevron-right"></span>Offers</a></li>

									<li {{ (Request::is('admin/requests*') ? 'class="active"' : '') }}><a href="{{ URL::to('/admin/requests') }}"><span class="glyphicon glyphicon-chevron-right"></span>Requests</a></li>

								</ul>

							</div>

						@endif

					</div>

				</div>

			</div>

		</div>

	</div>

</div>



<div class="top-menu">

	<div class="wrapper">

		<div class="row">

			<div class="col-lg-12">

				<div class="row">

					<div class="col-lg-7">



						<ul class="default-menu">

						

							<li class="{{ (Route::is('home')) ? 'active' : null }}"><a href="{{ route('home') }}">Home</a></li>

							<li class="{{ (Route::is('offer.list') or Route::is('offer')) ? 'active' : null }}"><a href="{{ route('offer.list') }}">Offers</a></li>

							<li class="{{ (Route::is('request.list') or Route::is('request')) ? 'active' : null }}"><a href="{{ route('request.list') }}">Requests</a></li>

							

							@foreach( $menu as $menu_item )

								@if( is_array($menu_item['link']) )

									<li class="dropdown">

										<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> {{ $menu_item['title'] }} <b class="caret"></b></a>

										<ul class="dropdown-menu">

											@foreach( $menu_item['link'] as $subMenu )

												<li><a href=" {{ $subMenu['link'] }} "> {{ $subMenu['title'] }} </a></li>

											@endforeach

										</ul>

									</li>

								@else

									<li class="{{ $menu_item['class'] }}"><a href="{{ $menu_item['link'] }}"> {{ $menu_item['title'] }} </a></li>

								@endif

							@endforeach

							

						</ul>

														

					</div>

					<div class="col-lg-5">	

						<ul class="default-menu pull-right">

							@if (Sentry::check())

								<li class="xnavbar-text">{{ Sentry::getUser()->email }}</li>

								<li {{ (Request::is('admin/users/show/' . Sentry::getUser()->id) ? 'class="active"' : '') }}>

									<a href="{{ URL::to('admin/users/show/'.Sentry::getUser()->id) }}">Account</a></li>

								<li><a href="{{ URL::to('admin/users/logout') }}">Logout</a></li>

							@else

								<li {{ (Request::is('admin/users/login') ? 'class="active"' : '') }}><a href="{{ URL::to('admin/users/login') }}">Login</a></li>

								<li {{ (Request::is('admin/users/register') ? 'class="active"' : '') }}><a href="{{ URL::to('admin/users/register') }}">Register</a></li>

							@endif

							

							

						</ul>											

					</div>

					<!--

					<div class="col-lg-1 col-lg-offset-5 text-center">

						<a href="">Log In</a>

					</div>

-->



					

				</div>

			</div>

		</div>

	</div>

</div>



<div class="page">

	<div class="wrapper">

		<div class="row">

			<div class="col-lg-12">

				<div class="row content">

					

					<!-- Notifications -->

					@include('_partials/notifications')

					<!-- ./ notifications -->



					<!-- Content -->

					@yield('content')

					<!-- ./ content -->

					

					<div class="logo-big">&nbsp;</div>					

				</div>

			</div>

		</div>

	</div>

</div>

	

<div class="footer">

	<div class="wrapper">

		<div class="row">

			<div class="col-lg-12">

				&copy; 2013 Hour Exchange

			</div>

		</div>

	</div>

</div>



</body>

</html>

