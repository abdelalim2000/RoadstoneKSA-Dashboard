@extends('layouts.site')
@section('title', 'Roadstone KSA - '. $article->title)
@section('og_title', 'Roadstone KSA - '. $article->title)
@section('seo_description',  $article->seo_description )
@section('og_description',  $article->seo_description )
@section('seo_keywords', $article->seo_keywords )

@section('content')



@endsection
