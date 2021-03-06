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
        $url_bace= route('faq.index');
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

        <form action="{{ route('faq.update', ['id'=>$faq->id]) }}" method="POST" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
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
                <input id="Question" type="text" class="validate" name="Question" value="{{ $faq->Question}}">
                <label class="active" for="Question">Question</label>
                @if ($errors->has('Question'))
                <span class="helper-text" data-error="wrong" data-success="right">{{ $errors->first('Question') }}</span>
                @endif
              </div>
            </div>
      
            <div class="row">
              <div class="input-field col s12">
                <textarea id="Answer" class="materialize-textarea" name="Answer">{{ $faq->Answer}}</textarea>
                <label for="Answer">Answer</label>
                @if ($errors->has('Answer'))
                <span class="helper-text" data-error="wrong" data-success="right">{{ $errors->first('Answer') }}</span>
                @endif
              </div>
            </div>
            
            <input type="submit" style="background: #011a25;" class="btn btn-primary btn-large btn-block"
                value="تعديل البيانات" />
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