<link rel="stylesheet" href="/CSS/style.css">
<!-- lightbox -->
<link rel="stylesheet" href="/CSS/lightbox.css">
<link rel="stylesheet" href="/CSS/lightbox.min.css">

@extends('layouts.myapp')
<div id="app" class="whole-body">

    @include('layouts.navbars.main')

    <div class="work-details">
        <div class=" container">
            <div class="row">
                <div class="col">
                    <p id="project-title">Project Title: {{ $latestwork->title }}</p>
                </div>
                <div class="col">
                    <p id="project-title">Project Date: {{ $latestwork->created_at }}</p>
                </div>
            </div>

            <div id="main">
                <div id="content">
                    {!! $latestwork->description !!}
                </div>
            </div>
            <div class="wholeimage">
                <a href="{{ $latestwork->url }}">
                    <div class="descriptionwork"></div>
                </a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.footer')
