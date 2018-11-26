<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!-- <script src="../vendor/bootstrap/js/bootstrap.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/template.js"></script>
<script src="../vendor/toastr/jquery.toast.min.js"></script>
<!-- <script src="../vendor/toastr/jquery.toast.js"></script> -->
<script src="../vendor/principal/principal.js"></script>
<script src="../vendor/semantic/semantic.js"></script>
<!-- <script src="../vendor/dataTable/dataTables.js"></script> -->

<style>

#loader {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 7%;
    display: none;
}

</style>

<div id="loader" class="ui segment">
      <p></p>
            <div class="ui active dimmer">
            <div class="ui loader"></div>
      </div>
</div>

<script>

      $(document).ajaxStart(function() {
            $('#loader').show()
      })

      $(document).ajaxStop(function() {
            $('#loader').hide()
      })

</script>