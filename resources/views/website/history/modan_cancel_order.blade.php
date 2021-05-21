
      <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h1 class="modal-title">Modal Heading</h1>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            
            <!-- Modal body -->
            <form action="{{route('cancel_order')}}" method="post">
            @csrf
            <div class="modal-body">
                <textarea class="form-control" name="cancle_notes"></textarea>
                <input type="hidden" name="id_order" value="">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" data-dismiss="modal">Đồng ý</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
            </div>
        </form>
          </div>
        </div>
      </div>
