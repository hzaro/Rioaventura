//$(function()
//{
  $(".lnkBorrar").on("click",function(e)
  {
    if(!confirm("Confirmar borrado."))
    {
      e.preventDefault();
    }
  });
//});
