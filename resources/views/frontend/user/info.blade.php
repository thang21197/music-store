@extends('frontend.layout.master')
@section('content')
    <section id="aa-myaccount ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="aa-myaccount">
                                    <span style="display: inline-block;font-weight: bold;font-size: 20px">USER INFO</span>
                                    <span style="display: inline-block">
                                        <a href="/user/edit" style="text-decoration: #00a157 underline">Edit Profile</a>
                                        <a href="/user/change" style="text-decoration: #00a157 underline">Change
                                                    password</a>
                                    </span>
                                    @if (session('Notice'))
                                        <div class="alert alert-success">
                                            <strong>{{session('Notice')}}</strong>
                                        </div>
                                    @endif
                                    <table class="info-user">
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Name:</th>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone:</th>
                                            <td>{{$user->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>{{$user->address}}</td>
                                        </tr>
                                        <tr>
                                            <th>Point:</th>
                                            <td>{{$user->point}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            {{-- History --}}
                            <div class="col-md-12" style="margin-bottom: 10px">
                                <div class="aa-myaccount-register">
                                    <h4>Order History</h4>
                                    <table class="order-table">
                                        <tr>
                                            <th>Order Code</th>
                                            <th>Discount</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($order as $row)
                                            <tr>
                                                <td>{{$row->code}}</td>
                                                <td>@if($row->discount==1)10% @else 0% @endif</td>
                                                <td>@if($row->status==0)Not Delivery @elseif($row->status==1)
                                                        Delivered @else Cancel @endif</td>
                                                <td>${{$row->total}}</td>
                                                <td><a href="/user/order/{{$row->order_id}}">Detail</a>
                                                    |@if ($row->status!=1)
                                                        <a class="delete_order_client"
                                                           href="/user/cancel_order/{{$row->order_id}}">Cancel</a>
                                                    @endif</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->

    <!-- footer -->
@endsection
