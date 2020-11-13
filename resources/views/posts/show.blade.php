@extends('layouts.app')

@section('title', 'Show product')

@section('content')
    <div class="container-fluid">
        <a href="/profile/{{$post->user->profile->id}}" id="btnBack" class="btn btn-outline-info">Back to profile</a>
    </div>
    <div class="container">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
            <div class="card shadow">
                <div class="card-header text-center bg-primary text-light">
                    <h3>{{$post->title}}</h3>
                </div>
                <div class="card-body">
                    <img class="w-100" src="/storage/{{$post->image}}" alt="/storage/{{$post->image}}">
                </div>
                <div class="card-footer">
                    <h3 class="text-center text-danger">
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
                    <div class="row d-flex justify-content-between pt-3">
                        @can('update', $post)
                            <a href="/post/{{$post->id}}/edit" type="submit" class="btn btn-success">Edit product</a>
                        @endcan
                        <form action="/post/{{$post->id}}" method="post">
                            @csrf
                            @method('delete')

                            @can('delete', $post)
                                <button data-toggle="modal" data-target="#modal1" type="button" class="btn btn-danger">Delete product</button>
                            @endcan
                            <div id="modal1" class="modal show">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-light">
                                            <h3>Delete Product</h3>
                                        </div>
                                        <div class="modal-body">
                                            <div>Do you really want to delete this product?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-success">Cancel</button>
                                            <button type="submit" name="btnDelete" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="text-center">Product Description</h3>
            </div>
            <div class="card-body">
                <div class="text-justify">
                    {{$post->description}}
                </div>
            </div>
        </div>
    </div>
@endsection
