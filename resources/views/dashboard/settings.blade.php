@extends('dashboard.layout.app')

@section('title', 'Dashboard | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Website Settings</h1>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') ?? 'success' }} alert-dismissible fade show" role="alert">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.settings') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#general"
                            type="button" role="tab" aria-controls="home" aria-selected="true">General
                            Settings</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#about" type="button"
                            role="tab" aria-controls="profile" aria-selected="false">About Section</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane p-4 fade show active" id="general" role="tabpanel" aria-labelledby="home-tab">
                        <x-input name="site_name" label="Site Name" placeholder="Site Name"
                            value="{{ $settings['site_name'] ?? '' }}" />
                        <x-input type="file" name="logo" label="Logo" value="{{ $settings['logo'] ?? '' }}" />
                        <x-input name="fb" label="Facebook" placeholder="Facebook URL"
                            value="{{ $settings['fb'] ?? '' }}" />
                        <x-input name="tw" label="Twitter" placeholder="Twitter URL"
                            value="{{ $settings['tw'] ?? '' }}" />
                        <x-input name="in" label="Instagram" placeholder="Instagram URL"
                            value="{{ $settings['in'] ?? '' }}" />
                        <x-input name="yt" label="Youtube" placeholder="Youtube URL"
                            value="{{ $settings['yt'] ?? '' }}" />
                    </div>
                    <div class="tab-pane p-4 fade" id="about" role="tabpanel" aria-labelledby="profile-tab">
                        <x-input type="file" name="about_image" label="About Image"
                            value="{{ $settings['about_image'] ?? '' }}" />
                        <div class="row">
                            <div class="col-md-6">
                                <x-input name="about_subtitle_en" label="English About Subtitle"
                                    placeholder="Enter english about subtitle.. "
                                    value="{{ $settings['about_subtitle_en'] ?? '' }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input name="about_subtitle_ar" label="Arabic About Subtitle"
                                    placeholder="Enter arabic about subtitle.. "
                                    value="{{ $settings['about_subtitle_ar'] ?? '' }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-input name="about_title_en" label="English About Title"
                                    placeholder="Enter english about title.. "
                                    value="{{ $settings['about_title_en'] ?? '' }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input name="about_title_ar" label="Arabic About Title"
                                    placeholder="Enter arabic about title.. "
                                    value="{{ $settings['about_title_ar'] ?? '' }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-textarea name="about_desc_en" label="English About Description"
                                    placeholder="Enter english about desc.. "
                                    value="{{ $settings['about_desc_en'] ?? '' }}" />
                            </div>
                            <div class="col-md-6">
                                <x-textarea name="about_desc_ar" label="Arabic About Description"
                                    placeholder="Enter arabic about desc.. "
                                    value="{{ $settings['about_desc_ar'] ?? '' }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-dark px-4"><i class="fas fa-save"></i> Save</button>
            </form>
        </div>
    </div>
@endsection
