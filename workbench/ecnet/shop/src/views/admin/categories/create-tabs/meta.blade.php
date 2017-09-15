<div class="tab-pane" id="tab_meta">
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">Meta Title:</label>
            <div class="col-md-10">
                <input type="text" class="form-control maxlength-handler" name="meta_title" maxlength="100" placeholder="">
                <span class="help-block">
                     max 170 chars
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Meta Keywords:</label>
            <div class="col-md-10">
                <textarea class="form-control maxlength-handler" rows="3" name="meta_keywords" maxlength="1000"></textarea>
                <span class="help-block">
                     max 170 chars
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Meta Description:</label>
            <div class="col-md-10">
                <textarea class="form-control maxlength-handler" rows="3" name="meta_description" maxlength="255"></textarea>
                <span class="help-block">
                     max 170 chars
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Robots:</label>
            <div class="col-md-10">
                {{Form::select('robots',[
                    'INDEX,FOLLOW'=>'INDEX,FOLLOW',
                    'INDEX,NOFOLLOW'=>'INDEX,NOFOLLOW',
                    'NOINDEX,FOLLOW'=>'NOINDEX,FOLLOW',
                    'NOINDEX,NOFOLLOW'=>'NOINDEX,NOFOLLOW',
                ],null,['class'=>'form-control'])}}
            </div>
        </div>


    </div>
</div>