@extends('admin.main')

@section('contents')
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Active</th>
                {{-- <th>Description</th> --}}
                {{-- <th>Content</th> --}}
                {{-- <th>Created Time</th> --}}
                <th>Updated Time</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
            {{-- @foreach ($menus as $menu)
                <tr>
                    <th>{{ $menu->id }}</th>
                    <th>{{ $menu->name }}</th>
                    <th>{{ $menu->parent_id }}</th>
                    <th>{{ $menu->description }}</th>
                    <th>{!! $menu->content !!}</th>
                    <th>
                        <label class="switch">
                            @if ( $menu->active  === "0")
                                <input type="checkbox">  
                            @else  
                                <input type="checkbox" id="checkbox_{{ $menu->id }}" checked> 
                            @endif 
                            <span class="slider round"></span>
                        </label>
                    </th>
                    <th>{{ $menu->created_at }}</th>
                    <th>{{ $menu->updated_at }}</th>
                </tr>
            @endforeach --}}

        </tbody>
    </table>
@endsection