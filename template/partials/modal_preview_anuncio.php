
                <?php 
                $categoria = Categoria::recuperarTodos();
                $anuncio = Anuncio::buscarPorIdSolictud($idSolicitud);  
                ?>

                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="exampleModalLabel">Preview</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">  


                    <div class="container">
                    <div class="row">
                <?php foreach ($anuncio as $item): ?>
                <div class="featured-responsive">

                    <div class="featured-place-wrap w-100 box-anuncio" >

                        <a href="#">

                            <img src="../admin/modules/posts/<?php echo $item['url_imagen']; ?>" class="img-fluid" alt="#">
                            <!-- <span class="featured-rating-orange">8.5</span> -->
                            <div class="featured-title-box">
                                <h6><?php echo $item['titulo']; ?></h6>
                                <p><?php echo $item['nombre']; ?></p> <span>• </span>
                                <p><span><?php echo $item['municipio']; ?></span> </p>
                               
                                
                                <ul>
                                    <li><span class="icon-location-pin"></span>
                                        <p><?php echo $item['calle']; ?>, <?php echo $item['colonia']; ?>, C.P. <?php echo $item['cp']; ?></p>
                                    </li>
                                    <li><span class="icon-screen-smartphone"></span>
                                        <p><?php echo $item['telefono']; ?></p>
                                    </li>
                                    <li><span class="icon-link"></span>
                                        <p>
                                        <?php 
                                        echo $item['sitio']; 
                                        if($item['sitio']==NULL){
                                           echo '<small class="text-warning">Aún no se ha definido un sitio web (Opcional)</small>';
                                        }
                                        ?>
                                        </p>
                                    </li>
                                    <li><span class="icon-clock"></span>
                                        <p>
                                        <?php 
                                        echo $item['entrada']; ?> - <?php echo $item['cierre'];
                                        
                                        if($item['entrada']=='00:00'&& $item['cierre']=='00:00'){
                                            
                                            echo ' <small class="text-danger">Aún no se ha definido un horario</small>';
                                        }
                                        ?></p>
                                    </li>

                                </ul>
                                <div class="bottom-icons">
                                    <div class="closed-now">ABIERTO AHORA</div>
                                    <span class="icon-social-twitter"></span>
                                    <span class="icon-social-facebook"></span>
                                    <span class="icon-like"></span>
                                   
                                    
                                </div>
                            </div>

                        </a>

                    </div>

                </div>
                  <?php endforeach; ?>

              </div>
              </div>
                    
                    
        
                          </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>