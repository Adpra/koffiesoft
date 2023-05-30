@extends('layouts.master')

@section('title', $title)

@section('content')

<div class="mb-5">
  <h2>{{$title}}</h2>

  @if (session('message'))
  <div class="alert alert-info">{{ session('message') }}</div>
  @endif
</div>
<div>
  <div class="d-flex justify-content-between">
    <div class="mb-5">
      <form action="{{route($route)}}" method="get">
        @csrf
        <div class="d-flex">
          <div class="mr-3">
            <div class="form-outline mb-4">
              <input type="text" id="form2Example1" class="form-control" name="search" value="{{old('search') ?? request()->search}}"/>
            </div>          
          </div>
          <div>
            <button class="btn btn-primary" type="submit" >
              Search
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          @if(auth()->user()->role == 'admin')
          <th scope="col">Action</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          @if(auth()->user()->role == 'admin')
          <td>
            <div class="d-flex">
                <form action="{{route('cms.admin.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          </td>
          @endif
        </tr>
          @empty
          <table>
            <thead>
              <tbody>
                <tr>
                  <div class="text-center">No Data</div>
                </tr>
              </tbody>
            </thead>
          </table>
          @endforelse
      </tbody>
    </table>
    <div>
      {{ $users->links() }}
    </div>
</div>


@endsection