@extends('Back.LAYOUT.Add')
@section('title', 'اضافة موضوع جديد')
@section('content')
<div class="container-fluid" style="
text-align: center;
font-size: 161%;
background: #011a25;
width: 100%;
padding: 4%;
color: white;
">
    نموذج بيانات لجدول قاعدة بيانات
    <img src="https://image.flaticon.com/icons/svg/1455/1455095.svg" width="100">
    <br>
    <br>
    <div class="container">
        @php
        $url_bace="/admin/customers";
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

        <form action="{{  route('customers.update',$customers->id)  }}" method="POST" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
          
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
            <div class="file-field input-field">
              <div class="btn">
                <span>File</span>
                <input type="file" name="Extension" value="{{Request::old('Extension')}}">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
              @if ($errors->has('Extension'))
              <span class="helper-text" data-error="wrong" data-success="right">{{ $errors->first('Extension') }}</span>
              @endif
            </div>
      
      
            <input type="submit" style="background: #011a25;" class="btn btn-primary btn-large btn-block"
                value="تعديل البيانات" />
            <div class="col-md-9">
            </div>
        </form>
        <img class="responsive-img img-thumbnail" width="150"
        src="{{Request::root()}}{{ $path }}{{ $customers->Image}}">
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