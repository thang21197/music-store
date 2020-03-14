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
                 <h4>Change Password</h4>
                 @if (session('Notice'))
                   <div class="alert alert-danger">
                  <strong>{{session('Notice')}}</strong> 
                   </div>
                 @endif
                 <form action="/user/change" class="aa-login-form" method="post">
                   @csrf
                    <label for="">Old Password:<span>*</span></label>
                    <input type="password" placeholder="Password" name="password" value="">
                    {!!ShowError($errors,'password')!!}
                     <label for="">New Paswword<span>*</span></label>
                    <input type="password" placeholder="New password" name="new_password" value="">
                    {!!ShowError($errors,'new_password')!!}
                     <label for="">Re-new Password<span>*</span></label>
                    <input type="password" placeholder="Re-new Password" name="re_new_password" value="">
                    {!!ShowError($errors,'re_new_password')!!}
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