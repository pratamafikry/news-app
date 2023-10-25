@extends('dashboard.layout.main')

@section('container')
    <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Berita</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Lihat</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Postingan</h4>
                                <article>
                                    <h2>{{$post->title}}</h2>
                                    <p>Author : {{$post->author->name}} in {{$post->category->category}}</p>
                                    @if ($post->image)
                                    <div style="max-height: 350px; overflow:hidden;">
                                    <img src="{{ asset('storage/'.$post->image)}}" class="card-img-top" alt="{{$post->category->name}}">
                                    </div>
                                    @else
                                    <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" class="card-img-top" alt="{{$post->category->name}}">
                                    @endif
                                    <div class="mt-3">
                                    {!! $post->body !!}
                                    </div>
                                </article>
                                <a href="/dashboard/news" class="btn btn-info" style="margin-top: 20px"><span class="bi bi-arrow-left"></span> Kembali ke daftar postingan</a>
                                <a href="/dashboard/news/{{$post->slug}}/edit" class="btn btn-warning" style="margin-top: 20px"> <span class="bi bi-pencil"></span> Edit Postingan</a>
                                <form action="/dashboard/news/{{$post->slug}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')" style="margin-top: 20px"><span class="bi bi-trash3"></span> Hapus Postingan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection