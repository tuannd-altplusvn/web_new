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
        <h3><b>Cart:ID({{$cart->id}})</b></h3>
        <br>
        <form action="{{route('cart.update', ['id' => $cart->id])}}" id="update_cart_form" method="post">
            {{ csrf_field() }}
            <table class="table table-bordered">
            <thead>
              <tr>
                <th>NO#</th>
                <th>Product</th>
                <th>Image</th>
                <th>Qty</th>
                <th>Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $index = 0; ?>
            @foreach($cart->order as $order)
                <tr>
                    <td>
                        {{$order->id}}
                        <input type="hidden" name="products[{{$index}}][product_id]" value="{{$order->product->id}}">
                    </td>
                    <td><div class="product_name">{{$order->product->name}}</div></td>
                    <td>
                        <img src="@if( strpos($order->product->image, 'http://') === false && strpos($order->product->image, 'https://') === false){{ Voyager::image( $order->product->image ) }}@else{{ $order->product->image }}@endif" width="100px">
                    </td>
                    <td><input type="number" name="products[{{$index}}][qty]" value="{{$order->qty}}" min="1" max="10" required></td>
                    <td>${{$order->product->price}}</td>
                    <td class="no-sort no-click">
                        <button  class="btn btn-danger pull-right delete_order" data-cart="{{$cart->id}}" data-order="{{$order->id}}" data-toggle="modal" data-target="#delete_form">
                            <i class="voyager-trash"></i> Delete
                        </button> 
                    </td>
                </tr>
                <?php $index++; ?>
            @endforeach
            </tbody>

            <br>
            <br>
            <br>
            </table>
            <input type="hidden" value="1" name=status>
        <a href="{{route('home')}}" type="button" class="btn btn-primary">Continue shopping</a>   <button type="submit" class="btn btn-success">Checkout</button>
        </form>
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
            $.growl.notice({ message: "Action successfully!" });
        @endif
    </script>
@endsection