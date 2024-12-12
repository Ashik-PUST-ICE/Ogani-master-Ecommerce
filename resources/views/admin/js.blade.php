<script type="text/javascript">


    function confirmation(ev)
    {
      ev.preventDefault();

      var urlToRedirect = ev.currentTarget.getAttribute('href'); // Correct 'href'
      console.log(ev.currentTarget); // Log the current target element

      swal({
        title: "Are You sure To delete This",
        text: "This delete will be permanent",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {  // Correct arrow function syntax
        if (willDelete) {
          window.location.href = urlToRedirect; // Correct 'href'
        }
      });
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
