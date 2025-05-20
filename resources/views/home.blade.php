@extends('layouts.app')

@section('title', 'Home')

@section('content')
<x-hero :heroes="$heroes"/>
<x-stats />
<x-about-section />
<x-news :featuredPosts="$featuredPosts" />
<x-get-involved />
<x-featured-initiatives :initiatives="$initiatives" />
<x-resources :resources="$resources" />
<x-newsletter />
  
@endsection