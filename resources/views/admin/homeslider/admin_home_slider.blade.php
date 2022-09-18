@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Home Slider Page</h4>
                        
                    <form action="{{ route('update.slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input class="form-control"  name="id" type="hidden" value="{{ $home_sliderData->id }}" id="example-text-input">

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Title :</label>
                            <div class="col-sm-10">
                                <input class="form-control"  name="title" type="text" value="{{ $home_sliderData->title }}" id="example-text-input">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Home Intro :</label>
                            <div class="col-sm-10">
                                <input class="form-control"  name="home_intro" type="text" value="{{ $home_sliderData->home_intro }}" id="example-text-input">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Video URL:</label>
                            <div class="col-sm-10">
                                <input class="form-control"  name="video" type="text" value="{{ $home_sliderData->video }}" id="example-text-input">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Home Slider</label>
                            <div class="col-sm-10">
                                <input class="form-control"  name="home_slider" type="file"  id="Image">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($home_sliderData->home_slider)?url($home_sliderData->home_slider):url('upload/no_image.jpg'))}}" alt="Card image cap">     
                            </div>
                        </div>
                        
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
    </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
    $("#Image").change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
          
        }
        reader.readAsDataURL(e.target.files['0']);
    })

   })

    
    
</script>

@endsection