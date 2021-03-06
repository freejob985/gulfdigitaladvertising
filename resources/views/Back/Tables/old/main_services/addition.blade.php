@extends('Back.LAYOUT.Add')
@section('title', 'اضافة موضوع جديد')
@section('content')
<div class="container-fluid" style="text-align: center;font-size: 161%;background: #011a25;width: 100%;padding: 4%;color: white;">
  نموذج بيانات لجدول قاعدة بيانات
  <img src="https://image.flaticon.com/icons/svg/1455/1455095.svg" width="100">
  <br>
  <br>
  <div class="container">
      @php
      $url_bace= route('main_services.index');
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
    <form action="{{route('main_services.store')}}" method="POST" enctype="multipart/form-data">
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
        <div class="input-field col s6">
          <input id="Title" type="text" class="validate" name="Title" value="{{Request::old('Title')}}">
          <label class="active" for="Title">العنوان</label>
          @if ($errors->has('Title'))
          <span class="helper-text" data-error="wrong" data-success="right">{{ $errors->first('Title') }}</span>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="Explanation" class="materialize-textarea" name="Explanation">{{Request::old('Explanation')}}</textarea>
          <label for="Explanation">الموضوع</label>
          @if ($errors->has('Explanation'))
          <span class="helper-text" data-error="wrong" data-success="right">{{ $errors->first('Explanation') }}</span>
          @endif
        </div>
      </div>

      <div class="row">
        <label>الايكون</label>
        <select class="browser-default" name="Icon">
          <option value="" disabled selected>Choose your option</option>
          @foreach( DB::table('icon')->orderBy('id', 'desc')->get()  as $item_icon)
          <option value="{{ $item_icon->icon}}">{{ $item_icon->icon}}</option>
          @endforeach
        </select>
        @if ($errors->has('Icon'))
        <span class="helper-text" data-error="wrong" data-success="right">{{ $errors->first('Icon') }}</span>
        @endif
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

    <div id="targetLayer"></div>
  </div>
</div>
@endsection