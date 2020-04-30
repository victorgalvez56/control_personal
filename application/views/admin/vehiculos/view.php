<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Success card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<div class="card text-center fondoRojo">
  <div class="card-header">
    OOOOOOOO
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
  <?php echo $vehiculo->n_placa ?>
  <?php echo $vehiculo->n_motor ?>



  </div>
</div>
<style>

  .fondoRojo{
    background: red;
  }
</style>

<!-- 

{"vehiculo":{"id":"7","n_placa":"12","n_serie":"12","n_vin":"UYG","n_motor":"UY","n_color":"GUYGUYG","marca":"UYG","modelo":"UYG","placa_vigente":"UYG","placa_anterior":"UGY","anotaciones":"GUYG","sede":"AREQUIPA","personal_id":"82","estado":"1"}}


-->