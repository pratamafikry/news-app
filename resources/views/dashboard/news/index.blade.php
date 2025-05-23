@extends('dashboard.layout.main')

@section('container')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Berita</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Table</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Tgl. Buat</th>
                                        <th>Body</th>
                                        <th>Categori</th>
                                        <th>Status</th>
                                        <th>Views</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td>{{$post->excerpt}}</td>
                                        <td>{{$post->category->category}}</td>
                                        <td>{{$post->status}}</td>
                                        <td>{{$post->count}}</td>
                                        <td>
                                            <button type="button" class="btn mb-1 btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="/dashboard/news/{{$post->slug}}">Lihat Postingan</a>
                                                <a class="dropdown-item" href="/dashboard/news/{{$post->slug}}/edit">Edit Postingan</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Tgl. Buat</th>
                                        <th>Body</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Views</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <a href="/dashboard/news/create" style="margin-top: 5px" class="btn mb-1 btn-primary">Buat Berita Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection