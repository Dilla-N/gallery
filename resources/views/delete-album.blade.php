@extends('layouts.app')

@section('content')

<h2 class="text-center">delete Album</h2>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
@foreach($album as $item)
<form action="/deletes/{{$item->id}}" method="post" >
  @endforeach
    @csrf
      <div class="form-group m-5">
        <select name="category" class="form-control" id="category">
                                             
            <option value="name">Pilih album yang ingin di hapus</option>
            @foreach($album as $item)
            <option value="{{$item->id}}">{{ $item->nama}}</option>
            @endforeach
          </select>   
        </div>

      <button type="submit" class="btn btn-danger ">delete</button>
    </form>

@endsection