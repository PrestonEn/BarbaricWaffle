<link href="{!! asset('CSS/profileView.css') !!}" media="all" rel="stylesheet" type="text/css" />

@extends('navbarTop')

@section('content')

	<div class = "pageHeaderDiv col-xs-12" >
		<div class = "row pageTitle">
			{{$user->first_name}} {{$user->last_name}} 
		</div>
		<div class = "row">
			<img src="../{{$user->user_image_filename}}" id="profilePic" class="img-responsive img-circle">
		</div>
	</div>

	<div class="user_info col-xs-12">
		<div class="row">
			@if(Auth::check())
				<p>Contact me by phone at {{$user->phone}} or by email at {{$user->email}}.</p>
			@else
				<a href = "../signIn">Sign in</a> to view this users contact information!
			@endif
		</div>
	</div>

<!-- 	<div class = "col-xs-1"></div>
 	<div class = "col-xs-10">
        <h2>User's Listings </h2>
		<div class = "row">
			@if(empty($listings))
				<p>This user has no listing!</p>
			@else
				@foreach($listings as $list)
					<div class = 'col-xs-12 col-md-4'>
						<img class="listImages" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
						{{$list->unit}}
						<td class = "listingCell" onclick="window.location = '../../houseTemplate">
					</div>
				@endforeach
			@endif
		</div>
	</div> -->

@stop