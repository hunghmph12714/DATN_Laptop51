@extends('admin.layouts.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    

<h5 class="alert alert-danger  text-center">LIST NEWS</h5>

<div class="container">
    <table class="table table-striped">
    <thead class="thead">
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Title</th>
        <th scope="col">Image</th>
        <th scope="col">Description-Short</th>
        <th scope="col">Description</th>
        <th scope="col">Actor</th>
        <th scope="col">Category_news </th>
        <th scope="col">Status</th>
        <th scope="col">Created_at</th>
        <th scope="col"> 
            <button type="button" class="btn btn-primary"><a style="color:white;  text-decoration: none;" style="text-decoration" href="{{route('news.add')}}">Add News</a></button>
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($news as $item)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td> {{$item->title}} </td>
        <td><img src="{{asset($item->image)}}" alt="" width="100"></td>
        <td> {{$item->description_short}} </td>
        <td> {{$item->description}} </td>
        <td> 
        @if($item->user->id_role == 2)
          Admin
        @else
          Nhan Vien
        @endif  
        </td>
        <td> {{$item->category_news->name}} </td>
        <td> {{$item->status}} </td>
        <td> {{$item->created_at}} </td>
        <td> <button type="button" class="btn btn-primary"><a style="color:white;  text-decoration: none;" href="{{ route('news.edit', ['id'=>$item->id]) }}"> Edit</a></button>
            <button type="button" class="btn btn-danger"><a style="color:white;  text-decoration: none;" onclick="return confirm('Bạn có chắc muốn User')"  href="{{ route('news.remove', ['id'=>$item->id]) }}"> Delete</a></button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  
</div>
@endsection