@use('Illuminate\Support\Carbon')

@extends('layout.admin.index')

@section('adminPageTitle', __('admin/category.edit.title', ['category' => $product->title]))

@section('adminBreadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('admin.products.index') }}">
            {{ 'Ürünler' }}
        </a>
    </li>

    <li class="breadcrumb-item">
        {{ __('admin/category.edit.title', ['category' => $product->title]) }}
    </li>
@endsection

@section('adminPageCss')
    <link href="{{ asset('assets/admin/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/admin/plugins/css/dark/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/admin/plugins/css/light/editors/quill/quill.snow.css') }}">

    <style>
        .preview-image {
            position: relative;
            display: inline-block;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 5px;
            width: 160px;
        }
        .preview-image img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            display: block;
            margin: 0 auto;
        }
        .remove-image, .remove-existing-image {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(0, 0, 0, 0.5);
            border: none;
            color: #fff;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-size: 16px;
            line-height: 30px;
            text-align: center;
            cursor: pointer;
            transition: background 0.3s;
        }
        .remove-image:hover, .remove-existing-image:hover {
            background: rgba(0, 0, 0, 0.8);
        }
        .progress {
            height: 8px;
            margin-top: 8px;
        }
        .progress-bar {
            transition: width 0.4s ease;
        }
    </style>
@endsection

@section('content')
    <div id="flLoginForm" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('admin/category.edit.title', ['category' => $product->title]) }}</h4>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <!-- Yeni görsel ekleme alanı -->
                <div class="form-group">
                    <label for="images">Yeni Ürün Görselleri</label>
                    <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                </div>
                <div id="preview" class="d-flex flex-wrap"></div>

                <hr>

                <form class="row g-3" method="post" action="{{ route('admin.products.update', $product) }}"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <!-- Mevcut Görseller -->
                    <div class="form-group">
                        <label>Mevcut Görseller</label>
                        <div class="d-flex flex-wrap" id="currentImages">
                            @foreach($product->images as $image)
                                <div class="preview-image" data-image-id="{{ $image->id }}">
                                    <img src="{{ asset($image->path) }}" alt="Görsel">
                                    <button type="button" data-url="{{ route('admin.product.image.delete', $image->id) }}" class="remove-existing-image">&times;</button>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Gizli input: Asenkron upload ile alınan geçici görseller -->
                    <input type="hidden" name="temporary_images" id="temporary_images">

                    <div class="col-md-12">
                        <label for="category_id" class="form-label">{{ 'Alt Kategori' }}</label>
                        <select id="category_id" name="category_id" placeholder="Alt Kategori Seç..." autocomplete="off"
                                class="form-control">
                            <option value="">Alt Kategori Seç...</option>

                            @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" @selected(old('category_id', $product->category_id) == $subCategory->id)>
                                    {{ $subCategory->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title" class="form-label mt-4">{{ 'Ürün Adı' }}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $product->title) }}"
                                   placeholder="{{ 'Ürün için bir isim giriniz...' }}">

                            @error('title')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Türkçe Açıklama -->
                    <div class="form-group">
                        <label for="description_tr">Türkçe Açıklama</label>
                        <textarea name="description_tr" id="description_tr" class="form-control" rows="6">{{ old('description_tr', $product->description_tr) }}</textarea>
                        @error('description_tr')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- İngilizce Açıklama -->
                    <div class="form-group">
                        <label for="description_en">İngilizce Açıklama</label>
                        <textarea name="description_en" id="description_en" class="form-control" rows="6">{{ old('description_en', $product->description_en) }}</textarea>
                        @error('description_en')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>



                    <div class="col-12">
                        <button type="submit"
                                class="btn btn-primary">{{ 'Ürünü Güncelle' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('adminPageJs')
    <script src="{{ asset('assets/admin/js/scrollspyNav.js') }}"></script>

    <!-- CKEditor 5 Classic Editor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        // Türkçe açıklama için CKEditor kurulumu
        ClassicEditor
            .create(document.querySelector('#description_tr'), {
                ckfinder: {
                    uploadUrl: '{{ route('admin.product.image.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });

        // İngilizce açıklama için CKEditor kurulumu
        ClassicEditor
            .create(document.querySelector('#description_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('admin.product.image.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        $(document).ready(function(){
            var dt = new DataTransfer();
            var uploads = {};
            var tempImages = [];

            $('#images').on('change', function(e){
                $.each(e.target.files, function(i, file){
                    var duplicate = false;
                    for (var j = 0; j < dt.items.length; j++) {
                        if(dt.items[j].getAsFile().name === file.name){
                            duplicate = true;
                            break;
                        }
                    }
                    if(duplicate) {
                        var $existingPreview = $('.preview-image[data-file-name="'+file.name+'"]');
                        if($existingPreview.length > 0){
                            $existingPreview.addClass('duplicate-warning')
                                .attr('data-toggle', 'tooltip')
                                .attr('title', 'Aynı görseli seçtiniz, tekrar yüklenmeyecek.')
                                .tooltip({ trigger: 'manual' })
                                .tooltip('show');

                            setTimeout(function(){
                                $existingPreview.tooltip('hide');
                                $existingPreview.removeClass('duplicate-warning')
                                    .removeAttr('data-toggle')
                                    .removeAttr('title')
                                    .tooltip('dispose');
                            }, 2000);
                        }
                    } else {
                        dt.items.add(file);
                        var previewHtml = `
                    <div class="preview-image" data-file-name="${file.name}" data-upload-status="uploading">
                        <img src="" alt="Preview">
                        <button type="button" class="remove-image">&times;</button>
                        <div class="progress mt-2">
                          <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                `;
                        $('#preview').append(previewHtml);

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.preview-image[data-file-name="'+file.name+'"] img').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(file);

                        var formData = new FormData();
                        formData.append('file', file);
                        formData.append('_token', '{{ csrf_token() }}');

                        var xhr = new XMLHttpRequest();
                        uploads[file.name] = xhr;

                        xhr.upload.addEventListener("progress", function(event){
                            if (event.lengthComputable) {
                                var percentComplete = Math.round((event.loaded / event.total) * 100);
                                $('.preview-image[data-file-name="'+file.name+'"] .progress-bar')
                                    .css('width', percentComplete + '%')
                                    .attr('aria-valuenow', percentComplete);
                            }
                        }, false);

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4) {
                                if (xhr.status === 200) {
                                    var response = JSON.parse(xhr.responseText);
                                    if(response.success) {
                                        $('.preview-image[data-file-name="'+file.name+'"]').attr('data-upload-status', 'uploaded')
                                            .attr('data-temp-file', response.temp_file);
                                        tempImages.push(response.temp_file);
                                        $('#temporary_images').val(JSON.stringify(tempImages));
                                    }
                                } else {
                                    $('.preview-image[data-file-name="'+file.name+'"]').remove();
                                }
                            }
                        };

                        xhr.open("POST", "{{ route('admin.upload') }}", true);
                        xhr.send(formData);
                    }
                });
                $('#images')[0].files = dt.files;
            });

            // Yeni asenkron yüklenen görselleri iptal/silmek için.
            $('#preview').on('click', '.remove-image', function(){
                var $preview = $(this).closest('.preview-image');
                var fileName = $preview.data('file-name');
                var uploadStatus = $preview.attr('data-upload-status');

                if(uploadStatus === 'uploading'){
                    if(uploads[fileName]){
                        uploads[fileName].abort();
                    }
                    $preview.remove();
                    for (var i = 0; i < dt.items.length; i++) {
                        if(dt.items[i].getAsFile().name === fileName){
                            dt.items.remove(i);
                            break;
                        }
                    }
                    $('#images')[0].files = dt.files;
                } else if(uploadStatus === 'uploaded'){
                    var tempFile = $preview.data('temp-file');
                    $.ajax({
                        url: "{{ route('admin.upload.delete') }}",
                        method: 'POST',
                        data: {
                            file_name: tempFile,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response){
                            if(response.success){
                                $preview.remove();
                                tempImages = tempImages.filter(function(item){
                                    return item !== tempFile;
                                });
                                $('#temporary_images').val(JSON.stringify(tempImages));
                                for (var i = 0; i < dt.items.length; i++) {
                                    if(dt.items[i].getAsFile().name === fileName){
                                        dt.items.remove(i);
                                        break;
                                    }
                                }
                                $('#images')[0].files = dt.files;
                            } else {
                                alert('Dosya sunucudan silinemedi.');
                            }
                        },
                        error: function(){
                            alert('Silme işlemi sırasında hata oluştu.');
                        }
                    });
                }
            });

            // Mevcut ürün görsellerinin silinmesi (update formunda)
            $('#currentImages').on('click', '.remove-existing-image', function(){
                var $imgContainer = $(this).closest('.preview-image');
                var imageId = $imgContainer.data('image-id');

                $.ajax({
                    url: $(this).data('url'),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response){
                        if(response.success){
                            $imgContainer.remove();
                        } else {
                            alert('Görsel silinemedi.');
                        }
                    },
                    error: function(){
                        alert('Görsel silme işlemi sırasında hata oluştu.');
                    }
                });
            });
        });
    </script>
@endsection
