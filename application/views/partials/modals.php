
  <!-- Modal edit-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                .........
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal edit-->

  <!-- Modal add-->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Add Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                .........
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal add-->

  <!-- Modal delete-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <div class="alert alert-danger" role="alert" style="display: none;">
                    Delete Data Sukses
                </div>
              </div>
              <div class="modal-footer">
                  <form action="" method="post" id="form">
                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-sm btn-danger btn-icon-only text-light" id="btnDelete"><i class="fa fa-trash"></i></button>
                    <button class="btn btn-danger" id="btnDeleteProses" style="display: none;">PROSES DELETE ...</button>
                  </form>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal delete-->



<!-- modal delete -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
          <!-- alert -->
          <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
            Delete Data Sukses
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        </div>
         <div class="modal-footer">
            <form action="" method="post" id="form">
              <input type="hidden" name="id" id="id">
              <button type="button" class="btn btn-sm btn-danger btn-icon-only text-light" id="btnDelete"><i class="fas fa-trash fa-fw"></i></button>
              <button class="btn btn-danger" id="btnDeleteProses" style="display: none;">PROSES DELETE ...</button>
            </form>
        </div>
      </div>
    </div>
  </div>