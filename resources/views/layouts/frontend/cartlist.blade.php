@extends('layouts.app')
@section('content')
<table class="table table-bordered">
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Qantity</th>
        <th>SubTotal</th>
    </tr>
    </div>
    @foreach ($allDataDetails as $datas)
        @foreach($datas->items as $data)
        <tr>
            <td>{{ $data['name'] }}</td>
            <td>{{ $data['price'] }}</td>
            <td>{{ $data['quantity'] }}</td>  
            <td>{{ $data['total'] }}</td>  
        </tr>
        @endforeach
        <tr>
            <th colspan="3">Total Price</th>
            <td>{{ $datas->total }}</td>
        </tr>
    @endforeach
</table>
@endsection