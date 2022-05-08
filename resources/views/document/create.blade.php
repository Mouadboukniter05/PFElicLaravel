@extends('page')
@section('content')
<br>
<br>
@include('includes.errors')
<div class="container" >
        @if(Session::has('message'))
        <p class="alert alert-info m-120">{{ Session::get('message') }}</p>
        @endif
    <div class = "row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header text-white" style="background-color:#0033FF;">{{ __('Saisir votre documents perdus') }}</div>
                <div class="card-body" style="background-color:#B7D8F4;">
            <form action="{{route('document.store')}}" method="post">
                {{csrf_field()}}

                    <div class="form-check">
                            <input class="form-check-input" name="p[]" type="checkbox" value="CARTE NATIONALE"  id="p[]">
                                <label class="form-check-label" for="cnt">
                                     Carte nationale
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="p[]" type="checkbox" value="PASSEPORT"  id="p[]" >
                            <label class="form-check-label" for="PASSEPORT">
                                Passeport
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="p[]" type="checkbox"value="BAC" id="p[]" >
                                <label class="form-check-label" for="bac">
                                    BAC
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="p[]" type="checkbox" value="BAC+2" id="p[]" >
                                <label class="form-check-label" for="bac2">
                                 Diplome : BAC+2
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="p[]" value="LICENCE" type="checkbox"  id="p[]" >
                                 <label class="form-check-label" for="Licence">
                                    LICENCE
                                </label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-input" name="p[]" type="checkbox" value="BAC+5" id="p[]" >
                                <label class="form-check-label" for="BAC+5">
                                    BAC+5
                                </label>
                        </div>

                        <div class="form-group">
                                <label for="autre"></label>
                                 <input type="text" name="autre" class="form-control" id="autre" placeholder="autre">
                        </div>
                         <br/>
                        <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="enregistrer"  >
                        </div>
                </form>
                </div>
                </div>
        </div>
    </div>
</div>
@endsection
