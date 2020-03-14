function update_cart(rowId,qty){
	$.get('/cart/update/'+rowId+'/'+qty,
		function(data)
	{
         if (data==1)
         {
         	location.reload();
         }
         else{
         	alert("Cập nhật thất bại");
         }
	}
		);
}
function delete_cart(name){
   return confirm("Bạn có muốn xóa sản phẩm "+name+" trong giỏ hàng");
}
$(document).ready(function(){ 
  $("#form-cart").submit(function(e){
     e.preventDefault();
    $.get('/checklogin',
      function(data)
       {   
        if (data==1) {
         $('#login-modal').modal('show');   
        }
       else{
         if (data==2) {
           alert("Your cart is empty");
         }else{
         var r=confirm("Are you sure to want to pay ?");
         if (r==true) {
           $("#form-cart").unbind().submit(); 
           }
         }        
       }
   }
   );
  });
  $("#register-form").submit(function(e){
     e.preventDefault();
    var email= $("input[name=email_register]").val();
    var password = $("input[name=password_register]").val();
    var confirm_password = $("input[name=confrim_password]").val();
  });

  $(".delete_order_client").click(function(){
   confirm("Are you sure to want to delete your order ?");
    // if (r==true) {
    //   return true;
    // }
  });
});
