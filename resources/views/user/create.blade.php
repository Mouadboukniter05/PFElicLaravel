@extends('page')
@section('content')
<br>
<br>
@include('includes.errors')
<div class="container">
@if(Session::has('message'))
        <p class="alert alert-info m-120">{{ Session::get('message') }}</p>
        @endif
<div class = "row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header text-white" style="background-color:#0033FF;">{{ __('nouveau utilisateur') }}</div>
<div class="card-body" style="background-color:#B7D8F4;">
<form action="{{route('user.store')}}" method="post" enctype="multipart/form-data" >
    {{csrf_field()}}
  <div class="form-group">
      <input type="cin" name="cin" maxlength="8" minlength="8" class="form-control" id="cin" placeholder="cin"value="{{ old('cin') }}" required>
    </div>
    <div class="form-group">
      <label for="nom"></label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" value="{{ old('nom') }}" required>
    </div>

    <div class="form-group">
      <label for="prenom"></label>
      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom"value="{{ old('prenom') }}" required>
    </div>
    <div class="form-group">
      <label for="email"></label>
      <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
      <label for="password"></label>
      <input type="password" class="form-control" id="password" minlength="8" name="password" placeholder="password" required>
    </div>

    <div class="form-group">
      <label for="tel"></label>
      <input type="tel" class="form-control" id="tel" maxlength="10" minlength="10" name="tel" placeholder="telephone" value="{{ old('tel') }}" required>
    </div>
<br>
  <div class="form-group">
      <input type="submit" class="btn btn-primary" value="enregistrer">
    </div>
</form>
 </div>
</div>
 </div>
</div>
</div>
@endsection
