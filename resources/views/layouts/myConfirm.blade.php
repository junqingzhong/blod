<!-- Modal -->
<a class="hidden alert_confirm" data-toggle="modal" href="#myConfirm"></a>
<div class="modal fade" id="myConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="opacity: 1">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tittle</h4>
            </div>
            <div class="modal-body">
               <input class="form-control input-lg m-bot15 type_name" type="text"  placeholder="内容">
               <input type="hidden" name="_token_" value="{{csrf_token()}}">
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
                <button class="btn btn-warning editType" type="button"> 提交</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->