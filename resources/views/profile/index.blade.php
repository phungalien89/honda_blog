@extends('layouts.app')

@section('title', 'Profile Details')

@section('content')
<style>
    .description:first-letter{
        font-size: 4em;
        font-weight: bold;
        float: left;
        color: var(--primary);
    }
    .card img{
        transition: all 0.3s ease;
    }
    .card:hover .card-body>img{
        transform: scale(1.1);
        filter: sepia(100%);
    }
    .profileImage:hover{
        filter: drop-shadow(0px 0px 3px);
    }
</style>
<div class="container-fluid col-sm-10 col-md-8 col-lg-6">
    <div class="card shadow">
        <div class="card-header d-flex flex-column align-items-center">
            <img class="mx-auto rounded-circle profileImage" src="{{$user->profile->profileImage()}}" alt="{{$user->profile->profileImage()}}" style="width: 30%;">
            @can('update', $user->profile)
                <a class="mt-3 btn btn-outline-primary" href="/profile/{{$user->id}}/edit">Edit profile</a>
            @endcan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="font-weight-bold mx-auto" style="font-size: 2em;">{{$user->profile->title}}</div>
            </div>
            <div class="row px-3 mt-2">
                <div class="text-justify description" style="column-count: 3; column-rule: 3px ridge var(--light);">{{$user->profile->description}}</div>
            </div>
        </div>
    </div>
    <div class="text-center pt-3">
        @can('create', App\Post::class)
            <a class="btn btn-outline-primary" href="/post/create">Add product</a>
        @endcan
    </div>
</div>
    <div class="container-fluid pt-5">
        <div class="row">
            @foreach($user->posts as $post)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow">
                        <a href="/post/{{$post->id}}" class="stretched-link"></a>
                        <div class="card-header text-center bg-primary text-light">
                            <h3>{{$post->title}}</h3>
                        </div>

                        <div class="card-body">
                            <img src="/storage/{{$post->image}}" alt="{{$post->image}}" class="w-100">
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <h3 class="text-danger">
                                    <?php
                                    $price = $post->price;
                                    $editPrice = "";
                                    $price = strrev($price);
                                    for ($i = 1; $i <= strlen($price); $i++) {
                                        $editPrice .= $price[$i - 1];
                                        if ($i % 3 == 0 && $i != strlen($price)) {
                                            $editPrice .= ".";
                                        }
                                    }
                                    $editPrice = strrev($editPrice);
                                    echo $editPrice;
                                    ?>
                                    VND
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
