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