//$(function()
//{
  $(".btnBorrar").on("click",function(e)
  {
    boton=$(this);
    
    boton.parent().find("img").attr("src","../img_prod/noimage.png");
    boton.parent().find("input[type=hidden]").val("1");
  });
  
  $(".inpFoto").on("change",function(e)
  {
      //console.log("change");
    input=this;
    img=$(input).parent().find("img");
  
    if(input.files && input.files[0])
    {
      if(input.files[0].size>8388608)
      {
        alert("La foto no puede pesar mas de 8MB.");
        $(input).val('');
        return false;
      }
      
      var reader = new FileReader();

      reader.onload=function(e)
      {
        $(img).attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  });
//});
