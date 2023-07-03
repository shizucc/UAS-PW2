@extends('layouts/base')
@section('title')
    Edit Barang
@endsection
@section('content')
    
<form action="{{route('barang.update',$barang)}}" method="post">
    @csrf
    @method('put')
    <div class="mb-6">
      <label for="barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barang</label>
      <input type="text" value="{{$barang->nama}}" name="nama" id="barang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <div class="mb-6">
        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Kategori</label>
        <select name="id_kategori" id="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach ($kategoris as $kategori)
            <option {{($kategori->id==$barang->id_kategori)? "selected" : ""}} value="{{$kategori->id}}">{{$kategori->nama}}</option>
        @endforeach
        </select>

    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
  
@endsection