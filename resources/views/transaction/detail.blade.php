@extends('layout.master_layout')
@section('head')
@parent
<style type="text/css">
    .table {
        font-size: 18px;
    }
    .product_name {
        color: #ff590f;
        font-weight: bold;
    }
    .btn {
        margin-left: 3px;
    }
</style>
@endsection
@section('content')
<!--breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="{{route('home')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Cart</li>
        </ol>
    </div>
</div>
<!--//breadcrumbs-->
<!--checkout-->
<div class="container">
    <br>
    @if($cart)
        <h3><b>Cart:code({{$cart->id}})</b></h3>
        <br>
        <h3>Total: ${{$cart->amount}}</h3>
        <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th>NO#</th>
            <th>Product</th>
            <th>Image</th>
            <th>Qty</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
        <?php $index = 0; ?>
        @foreach($cart->order as $order)
            <tr>
                <td>
                    {{$index}}
                    <input type="hidden" name="products[{{$index}}][product_id]" value="{{$order->product->id}}">
                </td>
                <td><div class="product_name">{{$order->product->name}}</div></td>
                <td>
                    <img src="@if( strpos($order->product->image, 'http://') === false && strpos($order->product->image, 'https://') === false){{ Voyager::image( $order->product->image ) }}@else{{ $order->product->image }}@endif" width="100px">
                </td>
                <td>{{$order->qty}}</td>
                <td>${{$order->product->price}}</td>
            <?php $index++; ?>
        @endforeach
        </tbody>

        <br>
        <br>
        <br>
        </table>
        <br>
        <br>
    @else
        <h3><b>No cart</b></h3>
        <br>
        <br>
        <br>
    @endif
    
</div>
<!--//checkout-->

<div class="modal fade" id="delete_form" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="voyager-trash"></i> Are you sure you want to delete
                this ?</h4>
        </div>
        <div class="modal-footer">
            <form action="{{route('order.delete', ['id' => 'id'])}}" id="delete_form" method="post">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-danger pull-right delete-confirm"
                       value="Yes, Delete">
            </form>
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        @if(session('status'))
            $.growl.notice({ message: "Delete successfully!" });
        @endif
    </script>
@endsection