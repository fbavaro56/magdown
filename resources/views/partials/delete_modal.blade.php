<div class="modal fade" id="confirmDeleteModal_{{$magazine->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-delete" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><b>Are you sure?</b></h4>
            </div>
            <div class="modal-body">
                If you confirm the magazine <b>{{$magazine->name}} - {{\Carbon\Carbon::parse($magazine->publication_date)->format('F Y')}}</b>  will be destroy
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="{{url('delete-magazine/'.$magazine->id)}}" class="btn btn-danger">Continue</a>
            </div>
        </div>
    </div>
</div>