@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
        <div class="card shadow rounded-lg">
            <div class="card-header bg-primary text-light text-center">
                <h1 style="font-family: Goldman;">Edit Product</h1>
            </div>
            <form action="/post/{{$post->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <label style="font-family: Goldman;" class="font-weight-bold" for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="PCX" value="{{old('title') ?? $post->title}}">
                        @error('title')
                            <span class="invalid-feedback d-block"><strong>* {{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="row">
                        <label style="font-family: Goldman;" class="font-weight-bold" for="price">Price</label>
                        <input class="form-control" type="text" name="price" id="price" placeholder="56.000.000" value="{{old('price') ?? $post->price}}">
                        @error('price')
                        <span class="invalid-feedback d-block"><strong>* {{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="row my-3">
                        <label style="font-family: Goldman;" class="font-weight-bold" for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{old('description') ?? $post->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback d-block"><strong>* {{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="row">
                        <label style="font-family: Goldman;" for="image">Image</label>
                        <div class="custom-control custom-file">
                            <label id="txtFileName" class="custom-file-label" for="image">Choose an image to upload</label>
                            <input class="custom-file-input" type="file" name="image" id="image">
                        </div>
                        @error('image')
                        <span class="invalid-feedback d-block"><strong>* {{$message}}</strong></span>
                        @enderror
                        <img style="width: 30%;" class="mt-3 mx-auto img-thumbnail" id="uploadImage" src="/storage/{{$post->image}}" alt="/storage/{{$post->image}}">
                    </div>
                    <div class="row" style="column-gap: 1em;">
                        <button type="submit" id="btnUpdate" name="btnUpdate" class="btn btn-success mr-auto">Update</button>
                        <a href="/post/{{$post->id}}" id="btnAbort" name="btnAbort" class="btn btn-danger ml-auto">Abort</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(()=>{
           $('#image').on({
               'change' : (e)=>{
                    console.log(e.target.files);
                    var filePath = URL.createObjectURL(e.target.files[0]);
                    $('#txtFileName').html(e.target.files[0].name);
                    $('#uploadImage').attr({
                        'src' : filePath,
                        'alt' : filePath,
                    }).addClass('img-thumbnail');
               },
           })


        });
    </script>
@endsection
