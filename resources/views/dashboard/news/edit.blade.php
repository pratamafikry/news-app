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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Berita</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Berita</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               <form action="/dashboard/news/{{$post->slug}}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Judul Postingan</label>
                                    <input class="form-control input-default" type="text" name="title" id="title" value="{{old('title', $post->title)}}" placeholder="Masukkan judul Postingan...">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                    <input class="form-control input-default" type="text" name="slug" id="slug" value="{{old('slug', $post->slug)}}" placeholder="">
                                    @error('slug')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Kategori</label>
                                        </div>
                                        <select class="custom-select" name="category_id" id="category_id">
                                            @foreach ($categories as $category)
                                                @if(old('category_id', $post->category_id) == $category->id)
                                                    <option value="{{$category->id}}" selected>{{$category->category}}</option>
                                                @else
                                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Foto Postingan</label>
                                    <input class="col-sm-5" type="hidden" name="oldImage" value="{{$post->image}}">
                                    @if ($post->image)
                                        <img src="{{asset('storage/'.$post->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block" id="img-preview">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5 d-block" id="img-preview">
                                    @endif
                                    
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                
                                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                                                <label class="custom-file-label">Choose file</label>
                                                @error('image')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                </div>

                                <div class="mb-3">
                                    <label for="body" class="col-sm-2 col-form-label">Isi Berita</label>
                                    <input type="hidden" id="body" name="body" value="{{old('body', $post->body)}}">
                                    <trix-editor input="body"></trix-editor>
                                    @error('body')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>


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
        <script>
            const title = document.querySelector("#title");
            const slug = document.querySelector("#slug");
        
            title.addEventListener("keyup", function() {
                let preslug = title.value;
                preslug = preslug.replace(/ /g,"-");
                slug.value = preslug.toLowerCase();
            });
        
            document.addEventListener('trix-file-accept', function(e){
              e.preventDefault();
            })
        </script>
        <script>
            function previewImage() {
              const image = document.querySelector('#image');
              const imgPreview = document.querySelector('#img-preview');
          
              imgPreview.style.display = 'block';
          
              const oFReader = new FileReader();
              oFReader.readAsDataURL(image.files[0]);
          
              oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
              }
            }
            
          </script>
@endsection