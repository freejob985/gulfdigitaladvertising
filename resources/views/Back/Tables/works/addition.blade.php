@extends('Back.LAYOUT.Add')
@section('title', 'اضافة موضوع جديد')
@section('content')
<div class="container-fluid"
  style="text-align: center;font-size: 161%;background: #011a25;width: 100%;padding: 4%;color: white;">
  نموذج بيانات لجدول قاعدة بيانات
  <img src="https://image.flaticon.com/icons/svg/1455/1455095.svg" width="100">
  <br>
  <br>
  <div class="container">
    @php
    $url_bace="/admin/works/";
    @endphp
    @include('Back.Source.link')
  </div>
</div>
<br>
<div class="container-fluid" style="height: 100%">
  <div class="container">
    <br>
    <br>
    <br>
    <br>
    <form action="{{route('works.store')}}" method="POST" enctype="multipart/form-data">
      @csrf



      <div class="row">
        <label>اللغة</label>
        <select class="browser-default" name="Language">
          <option value="" disabled selected>Choose your option</option>
          <option value="English">English</option>
          <option value="Arabic">Arabic</option>
        </select>
        @if ($errors->has('Language'))
        <span class="helper-text" data-error="wrong" data-success="right">{{ $errors->first('Language') }}</span>
        @endif
      </div>


      <div class="row">
        <label>القسم</label>
        <select class="browser-default" name="Section">
          <option value="" disabled selected>Choose your option</option>
          @foreach(\App\section_work::orderBy('id','desc')->get() as $item_section_work)
          <option value="{{ $item_section_work->Section}}">{{ $item_section_work->Section}}</option>
          @endforeach    
        </select>
        @if ($errors->has('Section'))
        <span class="helper-text" data-error="wrong" data-success="right">{{ $errors->first('Section') }}</span>
        @endif
      </div>




      <div class="row">
        <div class="input-field col s6">
          <input id="Title" type="text" class="validate" name="Title" value="{{Request::old('Title')}}">
          <label class="active" for="Title">العنوان</label>
          @if ($errors->has('Title'))
          <span class="helper-text" data-error="wrong" data-success="right">{{ $errors->first('Title') }}</span>
          @endif
        </div>
      </div>


      <div class="file-field input-field">
        <div class="btn">
          <span>File</span>
          <input type="file" name="Image" value="{{Request::old('Image')}}">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
        @if ($errors->has('Image'))
        <span class="helper-text" data-error="wrong" data-success="right">{{ $errors->first('Image') }}</span>
        @endif
      </div>
      <div class="form-group margin">
        <textarea class="form-control" rows="5" id="textarea" class="textarea" name="explanation"
          placeholder="مواعيد العمل"></textarea>
      </div>


      <input type="submit" style="background: #011a25;" class="btn btn-primary btn-large btn-block"
        value="اضافة موضوع جديد" />
      <div class="col-md-9">
      </div>
    </form>
    @if(session()->has('alert-success'))
    <div class="alert alert-success" style="width: 98%;">
      {{ session()->get('alert-success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div id="targetLayer"></div>
  </div>
</div>

@endsection