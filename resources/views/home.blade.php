@extends('layouts.app')

@section('title', 'Home')

@section('content')
<x-hero :heroes="$heroes" :degrees="$degrees" :cities="$cities" />
<x-stats />
<x-about-section />
<x-news :featuredPosts="$featuredPosts" />
<x-get-involved />
<x-featured-cities :cities="$cities" />
<x-newsletter />
  
@endsection