@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12">
        <h3>Category Management</h3>
        <a href="{{ route('admin.categories.create') }}" class="btn blue waves-effect waves-light">Add Category</a>
    </div>
    <div class="col s12">
        <table class="striped highlight">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        @if($category->image)
                            <img src="{{ asset('storage/'.$category->image) }}" width="50">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn-small orange"><i class="material-icons">edit</i></a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-small red"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
