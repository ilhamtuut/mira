@extends('layouts.backend',['active'=>'add','page'=>'news'])

@section('page-title')
Add News
@endsection

@section('content')
@include('layouts.partials.alert')
<div class="card card-custom">
  <div class="card-header">
    <h3 class="card-title">Add News</h3>
  </div>
  <!--begin::Form-->
  <form class="form" action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
    <div class="card-body">
      @csrf
      <div class="form-group">
          <label>Title</label>
          <input id="title" type="text" name="title" placeholder="Title" class="form-control">
      </div>
      <div class="form-group">
        <label>Image</label>
        <div></div>
        <div class="custom-file">
          <input name="image" type="file" class="custom-file-input" id="customFile" onchange="previewFile(this);">
          <label id="textInfo" class="custom-file-label selected" for="customFile">Image</label>
        </div>
        <img id="img-view" class="img-rounded" style="width: 25%; margin-top: 5px;">
        <span class="form-text text-muted">Preview image</span>
      </div>
      <div class="form-group">
          <label>Content</label>
          <textarea id="content" rows="10" type="text" name="content" placeholder="Content" class="form-control"></textarea>
      </div>
    </div>
    <div class="card-footer text-right">
      <div id="action">
        <button id="btn_submit" type="submit" class="btn btn-light-primary mr-2">Submit</button>
        <button id="btn_clear" type="button" class="btn btn-light-danger">Cancel</button>
      </div>
      <div class="text-center hidden" id="loader">
        <i class="fa fa-spinner text-danger fa-spin"></i>
      </div>
    </div>
   </form>
  <!--end::Form-->
</div>
@endsection

@section('script')
<script type="text/javascript">
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#img-view").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    $('#btn_submit').on('click',function () {
        $('#action').addClass('hidden');
        $('#loader').removeClass('hidden');
    });

    $('#btn_clear').on('click',function () {
      $('#title').val('');
      $('#customFile').val('');
      $('#content').val('');
      $('#textInfo').html('Image');
    });
</script>
@endsection
