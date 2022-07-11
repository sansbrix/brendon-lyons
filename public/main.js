$('.ask-before-delete').click( function() {
    let title = $(this).attr('title').split(" ");
    title = title[title.length-1];
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this "+title,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          let form = $(this).closest('tr').find('form').submit();
        } else {
          swal("Your "+title+" details is safe!");
        }
      });
});
