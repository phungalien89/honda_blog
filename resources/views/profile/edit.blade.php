@extends('layouts.app')

@section('title', 'Profile Edit')

@section('content')
    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
        <div class="card shadow rounded-lg">
            <div class="card-header bg-primary text-light text-center">
                <h1 style="font-family: Goldman;">Edit Profile</h1>
            </div>
            <form action="/profile" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <label style="font-family: Goldman;" class="font-weight-bold" for="title">Title</label>
                        <input class="form-control" @error('title') is-invalid @enderror type="text" name="title" id="title" value="{{old('title') ?? $user->profile->title}}">
                        @error('title')
                            <span class="invalid-feedback d-block">
                                <strong>* {{$message}}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="row my-3">
                        <label style="font-family: Goldman;" class="font-weight-bold" for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{old('description') ?? $user->profile->description}}</textarea>
                        @error('description')
                            <span class="invalid-feedback d-block"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="row">
                        <label style="font-family: Goldman;" for="profileImage">Profile image</label>
                        <div class="custom-control custom-file">
                            <label id="txtFileName" class="custom-file-label" for="profileImage">Choose an image to upload</label>
                            <input class="custom-file-input" type="file" name="profileImage" id="profileImage">
                        </div>
                        <img style="width: 30%;" class="mt-3 mx-auto img-thumbnail" id="uploadImage" src="{{$user->profile->profileImage()}}" alt="{{$user->profile->profileImage()}}">
                    </div>
                    <div class="row" style="column-gap: 1em;">
                        <button type="submit" id="btnUpload" name="btnUpload" class="btn btn-success mr-auto">Update</button>
                        <a href="/profile" id="btnAbort" name="btnAbort" class="btn btn-danger ml-auto">Abort</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(()=>{
           $('#profileImage').on({
               'change' : (e)=>{
                    console.log(e.target.files);
                    var filePath = URL.createObjectURL(e.target.files[0]);
                    $('#txtFileName').html(e.target.files[0].name);
                    $('#uploadImage').attr({
                        'src' : filePath,
                        'alt' : filePath,
                    });
               },
           })


        });
    </script>
@endsection
