@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <div class="row valign-wrapper mb-0">
                    <div class="col s6">
                        <h4 class="card-title">Manage Sliders</h4>
                    </div>
                    <div class="col s6 right-align">
                        <a href="{{ route('admin.sliders.create') }}" class="btn-floating btn-large waves-effect waves-light bg-gradient-primary">
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="card-panel green lighten-4 green-text text-darken-4 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="striped highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sliders as $slider)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image" class="materialboxed" width="100" style="border-radius: 4px;">
                            </td>
                            <td>
                                <span style="font-weight: 500; font-size: 1.1rem;">{{ $slider->title }}</span>
                                <br>
                                <small class="grey-text">{{ Str::limit($slider->description, 50) }}</small>
                            </td>
                            <td>
                                <span class="badge new" data-badge-caption="">{{ $slider->order }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn-floating waves-effect waves-light orange tooltipped" data-position="top" data-tooltip="Edit">
                                    <i class="material-icons">edit</i>
                                </a>
                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $slider->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn-floating waves-effect waves-light red tooltipped" data-position="top" data-tooltip="Delete" onclick="confirmDelete('delete-form-{{ $slider->id }}')">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="center-align">
                                <div class="placeholder-wrapper" style="padding: 40px;">
                                    <i class="material-icons grey-text lighten-2" style="font-size: 5rem;">photo_library</i>
                                    <h5 class="grey-text">No Sliders Found</h5>
                                    <p>Click the + button to add your first slider.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
