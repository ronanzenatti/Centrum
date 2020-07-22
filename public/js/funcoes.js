/*$(function () {
  if (typeof select2 === 'function') {
       $('.select2').select2({
           language: "pt-BR"
       });
   }

   console.log(typeof summernot );

   if (typeof summernote === 'function') {

   }
   if (typeof bootstrapSwitch === 'function') {

   }
});*/

function deleteData(table, id, tableName) {
   swal.fire({
       title: "Deletar Registro",
       text: "Deseja deletar o registro #" + id + "?",
       icon: "warning",
       showCancelButton: true,
       confirmButtonText: "Sim, Deletar!",
       cancelButtonText: "Não, Cancelar.",
       confirmButtonColor: '#d33',
       cancelButtonColor: '#3085d6',
   }).then((result) => {
       if (result.value) {
           $.ajax({
               url: table + "/" + id,
               type: "DELETE",
               data: {
                   _token: $("[name='_token']").val()
               },
               success: function (data) {
                   if (tableName) {
                       $("#" + tableName).DataTable().ajax.reload();
                       console.log("nome");
                   } else {
                       $('table').DataTable().ajax.reload();
                   }
                   swal.fire("Deletado!", "Seu Registro foi Deletado com Sucesso!", "success");
               },
               error: function (jqXHR, textStatus, errorThrown) {
                   alert(errorThrown);
               }
           });
       }
   });
}
