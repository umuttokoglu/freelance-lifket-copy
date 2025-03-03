@use('Illuminate\Support\Carbon')

@extends('layout.admin.index')

@section('adminPageTitle', 'İletişim')

@section('adminBreadcrumb')
    <li class="breadcrumb-item">
        {{ 'İletişim' }}
    </li>
@endsection

@section('adminPageCss')
    <link href="{{ asset('assets/admin/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div id="tableCustomBasic" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row mb-4">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h4>İletişim</h4>
                    </div>
                </div>

                @include('shared.admin.session_message')
            </div>


            <div class="widget-content widget-content-area">
                @if($messages->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">İsim</th>
                                <th scope="col">E-posta</th>
                                <th class="text-center" scope="col">Gönderilme Tarihi</th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>
                                        <p>{{ $message->name }}</p>
                                    </td>
                                    <td>
                                        {{ $message->email }}
                                    </td>
                                    <td class="text-center">
                                        {{ Carbon::parse($message->created_at)->translatedFormat('d F Y H:i') }}
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a href="#" class="action-btn btn-view btn-message-view bs-tooltip me-2"
                                               data-message="{{ $message->message }}"
                                               data-author="{{ $message->name }}"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Mesajı Gör">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-eye">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </a>

                                            <form id="contact-delete-form-{{ $message->id }}"
                                                  action="{{ route('admin.contact.destroy', ['contact' => $message]) }}"
                                                  method="POST"
                                                  style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>

                                            <a href="{{ route('admin.contact.destroy', ['contact' => $message]) }}"
                                               class="action-btn btn-delete bs-tooltip"
                                               data-toggle="tooltip" data-placement="top"
                                               title="{{ __('admin/category.index.table.th.actions.delete') }}"
                                               onclick="event.preventDefault(); document.getElementById('contact-delete-form-{{ $message->id }}').submit();">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $messages->links('pagination::bootstrap-5') }}
                @else
                    <div class="alert alert-light-warning alert-dismissible fade show border-0 mb-4" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-x close" data-bs-dismiss="alert">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>

                        {{ __('admin/category.index.table.empty') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('adminPageJs')
    <script src="{{ asset('assets/admin/js/scrollspyNav.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.btn-message-view').click(function() {
                // data-message attribute'unu oku
                var message = $(this).data('message');
                var author = $(this).data('author');

                // Dinamik modal HTML'sini oluştur
                var modalHtml = `<div class="modal fade" id="readMesage" tabindex="-1" role="dialog" aria-labelledby="readMesageTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">${author}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        <p class="modal-text">${message}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-light-dark" data-bs-dismiss="modal">Okudum</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    `;

                // Modalı body'e ekle
                $('body').append(modalHtml);

                // Modalı aç (Bootstrap modal örneği kullanılarak)
                $('#readMesage').modal('show');

                // Modal kapatıldığında DOM'dan kaldır
                $('#readMesage').on('hidden.bs.modal', function () {
                    $(this).remove();
                });
            });
        });
    </script>
@endsection
