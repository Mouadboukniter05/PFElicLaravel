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
                <div class="card-header text-white" style="background-color:#0033FF;">{{ __('modifier votre document') }}</div>
                <div class="card-body" style="background-color:#B7D8F4;">
        <form action="{{route('document.update', ['id' => $doc->id ])}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        {{csrf_field()}}
                <div class="form-check">
                        <input class="form-check-input"  name="p[]" type="checkbox" value="CARTE NATIONALE"  id="p[]"
                            @foreach ( explode(",",$doc->types) as $tab )
                            @if($tab == "CARTE NATIONALE")
                            checked
                            @break
                            @endif
                             @endforeach />
                            <label class="form-check-label" for="cnt">
                                     Carte nationale
                            </label>
                </div>
                <div class="form-check">
                        <input class="form-check-input" name="p[]" type="checkbox" value="PASSEPORT"  id="p[]"
                            @foreach ( explode(",",$doc->types) as $tab )
                            @if($tab == "PASSEPORT")
                            checked
                            @break
                            @endif
                         @endforeach />
                            <label class="form-check-label" for="PASSEPORT">
                                Passeport
                            </label>
                </div>
                <div class="form-check">
                        <input class="form-check-input" name="p[]" type="checkbox"value="BAC" id="p[]"
                            @foreach ( explode(",",$doc->types) as $tab )
                            @if($tab == "BAC")
                            checked
                            @break
                            @endif
                            @endforeach />
                            <label class="form-check-label" for="bac">
                                    BAC
                            </label>
                </div>
                <div class="form-check">
                        <input class="form-check-input" name="p[]" type="checkbox" value="BAC+2" id="p[]"
                            @foreach ( explode(",",$doc->types) as $tab )
                            @if($tab == "BAC+2")
                            checked
                            @break
                            @endif
                            @endforeach />
                            <label class="form-check-label" for="bac2">
                                 Diplome : BAC+2
                            </label>
                </div>
                <div class="form-check">
                        <input class="form-check-input" name="p[]" value="LICENCE" type="checkbox"  id="p[]"
                            @foreach ( explode(",",$doc->types) as $tab )
                            @if($tab == "LICENCE")
                            checked
                            @break
                            @endif
                            @endforeach
                         />
                            <label class="form-check-label" for="Licence">
                                    LICENCE
                            </label>
                </div>
                <div class="form-group">
                        <input class="form-check-input" name="p[]" type="checkbox" value="BAC+5" id="p[]"
                            @foreach ( explode(",",$doc->types) as $tab )
                            @if($tab == "BAC+5")
                            checked
                            @break
                            @endif
                         @endforeach  />
                            <label class="form-check-label" for="BAC+5">
                                    BAC+5
                            </label>
                </div>
                <div class="form-group">
                        <label for="autre"></label>
                            <input type="text" name="autre" class="form-control" id="autre" placeholder="autre"
                            @foreach ( explode(",",$doc->types) as $tab )
                         @endforeach
                            value="{{$tab}}">
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
