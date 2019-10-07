<div class="clearfix"></div>

    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; Faktor CPC
                </div>
                <div class="col-sm-6 text-right">
                    Designed by <a href="https://colorlib.com">Faktor CPC</a>
                </div>
            </div>
        </div>
    </footer> 

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="js/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/jquery-match-height/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="js/jquery/dist/jquery.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/Aseguradora.js"></script>
<script src="js/Paciente.js"></script>
<script src="js/btnDeleteAs.js"></script>
<script src="js/btnDeleteP.js"></script>
<script src="js/btnDeletePrc.js"></script>
<script src="js/medAseguradora.js"></script>
<script src="js/operaciones.js"></script>
<script src="js/jquery.dm-uploader.min.js"></script>
<script src="js/demo-ui.js"></script>
<script src="js/demo-ui2.js"></script>
<script src="js/demo-config.js"></script>
<script src="js/demo-config2.js"></script>
<script src="js/demo-config3.js"></script>
<script src="js/demo-configP.js"></script>
<script src="js/altaUsuario.js"></script>
<script src="js/desglose.js"></script>
<script src="js/del_Archivo.js"></script>
<script src="js/status.js"></script>


     <!-- File item template -->
    <script type="text/html" id="files-template">
      <li class="media">
        <div class="media-body mb-1">
          <p class="mb-2">
            <strong>%%filename%%</strong> - Estado: <span class="text-muted">Esperando</span>
          </p>
          <div class="progress mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
              role="progressbar"
              style="width: 0%" 
              aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
          <p class="controls mb-2">
        <button href="#" class="btn btn-sm btn-danger cancel" role="button" >Cancel</button>
      </p>
          <hr class="mt-1 mb-1" />
        </div>
      </li>
    </script>

    <script type="text/html" id="debug-template">
      <li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
    </script>   

    <script type="text/html" id="files-template2">
      <li class="media">
        <div class="media-body mb-1">
          <p class="mb-2">
            <strong>%%filename%%</strong> - Estado: <span class="text-muted">Esperando</span>
          </p>
          <div class="progress mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
              role="progressbar"
              style="width: 0%" 
              aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
          <p class="controls mb-2">
        <button href="#" class="btn btn-sm btn-danger cancel" role="button" >Cancel</button>
      </p>
          <hr class="mt-1 mb-1" />
        </div>
      </li>
    </script>

    <script type="text/html" id="debug-template2">
      <li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
    </script>

<script type="text/javascript">
    $('#btnFinalizar').on('click', function(evt){
     window.location.href='medico.php?page=documentos/vistaDocumentosP';
  });
    </script>
    
    
</body>
</html>