@extends('admin.admin')
@section('content')
     <div class="col-12">
        <div class="mb-2 text-end">
            <a href="{{url("/add")}}">
                <button type="button" class="btn btn-outline-success mt-4"><i class="bi bi-plus-lg"></i> Qo'shish</button>
            </a>
       </div>
        <div class="row ">
            @foreach ($data as $item)
            <div class="card m-auto my-4" style="width: 19rem;">
                <img src="{{$item->img}}" class="card-img-top" alt="product img">
                <div class="card-body">
                  <p class="card-text">Nomi: {{$item->nomi}}</p>
                  <p class="card-text">Narxi: {{$item->narx}}</p>
                  <a href="{{url("delete/".$item->menu_id)}}" class="btn btn-outline-danger">Delete</a>
                  <a href="{{url("edit/".$item->menu_id)}}" class="btn btn-outline-primary">Edit</a>
                </div>
              </div>
            @endforeach
        </div>
     </div>
@endsection
