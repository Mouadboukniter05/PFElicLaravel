@extends('page')

@section('content')
<br>
<br>
<style>
    .op{
         opacity: 0.6;
    }

</style>


<div class="container" >

        @if(Session::has('message'))
        <p class="alert alert-info m-120">{{ Session::get('message') }}</p>
        @endif

<div class = "row justify-content-center">
<div class="col-md-10">
<h1 ><span class="badge rounded-pill text-white" style="background-color:#0033FF;" >Tous les documents perdus</span ></h1>
<br class="my-4">
<table class="table table-striped">
    <thead class="text-white" style="background-color:#698EE9;" >
      <tr >
        <th>{{ __('Cin') }}</th>
        <th>{{ __('Les document perdus') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Actions') }}</th>


      </tr>
    </thead>

@if ( !$doc->isEmpty() )
    <tbody>
    @foreach ( $doc as $doc)
      <tr>
        <td><a class="alert-link"href="{{ route('document.list', ['cin'=> $doc->cin] ) }}">
        {{ $doc->cin }}
        </a>
        </td>

        <td>
        @foreach (explode(",",$doc->types) as $type )
            <span class="badge rounded-pill bg-warning text-dark op ">{{ $type }}</span>
        @endforeach

        </td>
        <td>
        @if($doc->is_it_find!=0)
        <span class="text-success">Trouvé</span>
        @else
        <span class="text-danger">Pas trouvé</span>
        @endif
        </td>
        <td>
        @if ($doc->is_it_find==0)
            <a href="{{ route('document.edit', ['id' => $doc->id]) }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
            </a>
        @endif
            @if(Auth::user()->is_admin)
           @if ($doc->is_it_find!=0)
        <a href="#" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
        </svg>
        </a>
        @endif
            <a href="{{ route('document.delete', ['id' => $doc->id]) }}" class="btn btn-danger" Onclick="return ConfirmDelete();">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
            </a>
         @endif
        </td>

      </tr>

    @endforeach
    </tbody>
    </table>
@else
</table>
    <p><em>{{ __('No documents perdus') }}</em></p>
@endif
   </div>
    </div>
</div>
@endsection

<script>

function ConfirmDelete()
{
  var x = confirm("Êtes-vous sûr?");
  if (x)
      return true;
  else
    return false;
}




</script>
