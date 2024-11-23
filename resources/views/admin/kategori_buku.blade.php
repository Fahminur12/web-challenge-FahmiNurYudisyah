@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

@section('main')

<div id="layoutSidenav">
    <aside class="w-64 bg-white border-r h-screen overflow-hidden flex-shrink-0">
        @include('template.sidebarAdmin')
    </aside>
    <div id="layoutSidenav_content">
     <main>
        <div class="px-4 border-b">
            <h1 class="mt-[10px] poppins-bold text-2xl">Kategori Buku</h1>
            <ol class="mb-[7px]">
                <li class="poppins-medium text-gray-400">Halaman Untuk Kategori Buku</li>
            </ol>
        </div>
   <div class="container-fluid px-4 mt-3">
                <a href="{{ route( 'action.createkategoribuku' ) }}"><button class="btn btn-primary mb-3">Tambah Kategori Buku</button></a>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full">
                        <thead class="bg-gray-50 text-white">
                            <tr class="text-[13px] poppins-medium bg-[#141313]">
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">No</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Nama Kategori</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $item)
                                <tr class="bg-white border-b text-md hover:bg-gray-500 poppins-regular">
                                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $item->kategori_nama }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-right">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('update_kategori_buku', ['id' => $item->kategori_id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('kategori_buku.delete', ['id' => $item->kategori_id]) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
