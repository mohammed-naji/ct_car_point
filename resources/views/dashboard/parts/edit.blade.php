@extends('dashboard.layout.app')

@section('title', 'Edit Type | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->


    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label>Type</label>
                {{ $part->type_id }}
                <select name="type_id" class="form-control @error('type_id') is-invalid @enderror">
                    <option value="" disabled selected> -- Select Type --</option>
                    @foreach ($types as $type)
                        <option @selected($part->type_id == $type->id) value="{{ $type->id }}">
                            {{ $type->id }} - {{ $type->trans_name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
@endsection
