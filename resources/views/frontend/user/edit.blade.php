@extends('frontend.layout.master')
@section('content')

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area account">         
            <div class="row">        
              <div class="col-md-12">
                <div class="aa-myaccount-register">                 
                 <h4>Edit Profile</h4>
                 @if (session('Notice'))
                   <div class="alert alert-success">
                  <strong>{{session('Notice')}}</strong> 
                   </div>
                 @endif
                 <form action="/user/edit" class="aa-login-form" method="post">
                   @csrf
                    <label for="">Your name<span>*</span></label>
                    <input type="text" placeholder="Your name" name="your_name" value="{{$user->name}}">
                    {!!ShowError($errors,'your_name')!!}
                     <label for="">Address<span>*</span></label>
                    <input type="text" placeholder="Your adress" name="address" value="{{$user->address}}">
                    {!!ShowError($errors,'address')!!}
                     <label for="">Telephone Number<span>*</span></label>
                    <input type="text" placeholder="Telephone number" name="telephone" value="{{$user->phone}}">
                    {!!ShowError($errors,'telephone')!!}
                    <button type="submit" class="aa-browse-btn">Confirm</button>
                    <button class="aa-browse-btn"><a href="/user/account">Cancel</button>                     
                  </form>
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