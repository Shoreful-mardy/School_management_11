<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <h2>HI.. {{Auth::user()->name}}</h2>
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
        <div class="row">

           <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Create Date</th>
    </tr>
  </thead>
  <tbody>
@php
    $user = App\Models\User::all();
@endphp
   <h2>Total User :<span class="text-danger">{{count($user)}}</span></h2>
      @foreach($user as $key => $item)
       <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{ $item->created_at->format('d/m/Y') }}</td>
       </tr>
      @endforeach
   

  </tbody>
</table> 
        </div>
       </div>
    </div>
</x-app-layout>
