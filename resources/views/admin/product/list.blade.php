@extends('admin.main')

@section('contents')
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Updated Time</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::product($products)!!}    
        </tbody>
    </table>
    @if( $products->count() == 0)
        <div style="text-align: center;">
            <p>Chưa có sản phẩm</p>
        </div>
    @endif
    
@endsection