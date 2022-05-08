@extends("page")
@section("content")
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
        <div class="card-header text-white" style="background-color:#0033FF;">{{ __('modifier votre compte') }}</div>
        <div class="card-body" style="background-color:#B7D8F4;">
        <form action="{{route('user.update', ['id' => $user->id ])}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" value="{{$user->nom}}" required>
                </div>
                <div class="form-group">
                        <label for="prenom"></label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom"value="{{$user->prenom}}" required>
                </div>
                <div class="form-group">
                         <label for="tel"></label>
                         <input type="tel" class="form-control" id="tel" maxlength="10" minlength="10" name="tel" placeholder="telephone" value="{{ $user->tel }}" required>
                </div>
                <br/>
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
