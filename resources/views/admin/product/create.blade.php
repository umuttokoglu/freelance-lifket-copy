@use('Illuminate\Support\Carbon')

@extends('layout.admin.index')

@section('adminPageTitle', 'Ürün Ekle')

@section('adminBreadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('admin.category.index') }}">
            {{ 'Ürün Ekle' }}
        </a>
    </li>

    <li class="breadcrumb-item">
        {{ 'Ürün Ekle' }}
    </li>
@endsection

@section('content')
    <div id="flLoginForm" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ 'Ürün Ekle' }}</h4>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <div class="col-md-12 mb-4">
                    <label class="form-label">{{ 'Ürün Görseli' }}</label>
                    <input type="file" class="form-control-file" id="images" name="images[]" multiple required>


                    <!-- Resim önizleme alanı -->
                    <div id="preview" class="d-flex flex-wrap"></div>


                    @error('image')
                    <small class="text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <form class="row g-3" method="post" action="{{ route('admin.products.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="temporary_images" id="temporary_images">

                    <div class="col-md-6">
                        <label for="category_id" class="form-label">{{ 'Alt Kategori' }}</label>
                        <select id="category_id" name="category_id" placeholder="Alt Kategori Seç..." autocomplete="off"
                                class="form-control">
                            <option value="">Alt Kategori Seç...</option>

                            @foreach($subCategories as $subCategory)
                                <option
                                    value="{{ $subCategory->id }}" @selected(old('category_id') == $subCategory->id)>
                                    {{ $subCategory->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="title" class="form-label">{{ 'Ürün Adı' }}</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                               placeholder="{{ 'Ürün için başlık' }}">

                        @error('title')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Türkçe Açıklama -->
                    <div class="form-group">
                        <label for="description_tr">Türkçe Açıklama</label>
                        <textarea name="description_tr" id="description_tr" class="form-control" rows="6">{{ old('description_tr') }}</textarea>
                        @error('description_tr')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- İngilizce Açıklama -->
                    <div class="form-group">
                        <label for="description_en">İngilizce Açıklama</label>
                        <textarea name="description_en" id="description_en" class="form-control" rows="6">{{ old('description_en') }}</textarea>
                        @error('description_en')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                   {{--
                    <div class="col-md-6">
                        <label for="inputPassword4"
                               class="form-label">{{ 'Ürün Açıklama (TR)' }}</label>

                        <div class="row m-1">
                            <div id="description_tr"
                                 data-placeholder="{{ 'Ürün için Türkçe açıklama giriniz...' }}">
                                {{ old('description_tr') }}
                            </div>

                            <textarea id="hidden_description_tr" name="description_tr" class="d-none">
                                {{ old('description_tr') }}
                            </textarea>
                        </div>

                        @error('description_tr')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="inputAddress"
                               class="form-label">{{ 'Ürün Açıklama (EN)' }}</label>

                        <div class="row m-1">
                            <div id="description_en"
                                 data-placeholder="{{ 'Ürün için İngilizce açıklama giriniz...' }}">
                                {{ old('description_en') }}
                            </div>

                            <textarea id="hidden_description_en" name="description_en" class="d-none">
                                {{ old('description_en') }}
                            </textarea>
                        </div>

                        @error('description_en')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>--}}

                    <div class="col-12">
                        <button type="submit"
                                class="btn btn-primary">{{ 'Ürünü Kaydet' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
            width: 160px; /* progress bar ve kenar boşluklarını kapsayacak genişlik */
        }
        .preview-image img {
            width: 150px;
            height: 150px; /* Sabit boyut */
            object-fit: cover;
            border-radius: 8px;
            display: block;
            margin: 0 auto;
        }
        .remove-image {
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
        .remove-image:hover {
            background: rgba(0, 0, 0, 0.8);
        }
        /* Duplicate uyarısı için */
        .preview-image.duplicate-warning {
            border: 2px solid green;
        }
        /* Progress bar için ufak stil düzenlemesi */
        .progress {
            height: 8px;
            margin-top: 8px;
        }
        .progress-bar {
            transition: width 0.4s ease;
        }
    </style>
@endsection

@section('adminPageJs')
    <script src="{{ asset('assets/admin/js/scrollspyNav.js') }}"></script>

    <script>
        $(document).ready(function(){
            // Global DataTransfer nesnesi (seçilen dosyaları tutmak için)
            var dt = new DataTransfer();
            // Her dosyaya ait XMLHttpRequest nesnelerini saklamak için mapping (file name -> xhr)
            var uploads = {};
            // Geçici dosya adlarını tutacak global dizi
            var tempImages = [];

            // Dosya seçildiğinde (birikimli seçim) asenkron upload
            $('#images').on('change', function(e){
                $.each(e.target.files, function(i, file){
                    // Duplicate kontrolü
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
                        // Dosyayı DataTransfer nesnesine ekle
                        dt.items.add(file);

                        // Önce preview container'ı oluşturuyoruz
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

                        // FileReader ile görselin önizlemesini ayarla
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.preview-image[data-file-name="'+file.name+'"] img').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(file);

                        // Asenkron upload (XMLHttpRequest ile)
                        var formData = new FormData();
                        formData.append('file', file);
                        // CSRF token (Laravel için)
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
                                    // Upload başarılı: Sunucudan gelen geçici dosya adını kaydedelim.
                                    var response = JSON.parse(xhr.responseText);
                                    if(response.success) {
                                        $('.preview-image[data-file-name="'+file.name+'"]').attr('data-upload-status', 'uploaded')
                                            .attr('data-temp-file', response.temp_file);
                                        // Global diziye ekle ve gizli input'u güncelle.
                                        tempImages.push(response.temp_file);
                                        $('#temporary_images').val(JSON.stringify(tempImages));
                                    }
                                } else {
                                    // Başarısızsa preview öğesini kaldır
                                    $('.preview-image[data-file-name="'+file.name+'"]').remove();
                                }
                            }
                        };

                        xhr.open("POST", "{{ route('admin.upload') }}", true);
                        xhr.send(formData);
                    }
                });
                // File input'un dosya listesini güncelliyoruz.
                $('#images')[0].files = dt.files;
            });

            // Silme butonu işlemleri
            $('#preview').on('click', '.remove-image', function(){
                var $preview = $(this).closest('.preview-image');
                var fileName = $preview.data('file-name');
                var uploadStatus = $preview.attr('data-upload-status');

                if(uploadStatus === 'uploading'){
                    // Upload devam ediyorsa iptal et
                    if(uploads[fileName]){
                        uploads[fileName].abort();
                    }
                    $preview.remove();
                    // DataTransfer'dan dosyayı kaldır
                    for (var i = 0; i < dt.items.length; i++) {
                        if(dt.items[i].getAsFile().name === fileName){
                            dt.items.remove(i);
                            break;
                        }
                    }
                    $('#images')[0].files = dt.files;
                } else if(uploadStatus === 'uploaded'){
                    // Upload tamamlandıysa: Sunucudan silme isteği gönder
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
                                // Global diziden de kaldır ve gizli input'u güncelle.
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
        });
    </script>

    <!-- CKEditor 5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        // Türkçe açıklama editor'ü
        ClassicEditor
            .create(document.querySelector('#description_tr'), {
                ckfinder: {
                    uploadUrl: '{{ route('admin.product.image.upload').'?_token='.csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });

        // İngilizce açıklama editor'ü
        ClassicEditor
            .create(document.querySelector('#description_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('admin.product.image.upload').'?_token='.csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
{{--
    <script src="{{ asset('assets/admin/plugins/src/editors/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/src/editors/quill/custom-quill.js') }}"></script>--}}
@endsection
