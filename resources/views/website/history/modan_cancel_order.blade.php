
      <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h2 class="modal-title">Bạn có muốn hủy đơn hàng!</h2>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            
            <!-- Modal body -->
            <form action="{{route('cancel_order')}}" method="post">
            @csrf
            <div class="modal-body">
                <label>Vui lòng cho chúng tôi biết lý do bạn hủy đơn hàng!</label>
                <textarea class="form-control" name="cancle_notes"></textarea>
                <input type="hidden" name="id_order" value="" id="id_order">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Đồng ý</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy</button>
            </div>
        </form>
          </div>
        </div>
      </div>
      @section('script')
          
      <script>
function click_cancel_order(id_order) {
    $('#id_order').val(id_order);
}
      </script>
      @endsection
      
