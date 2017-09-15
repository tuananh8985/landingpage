<div class="tab-pane active" id="tab_general">
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">Tên danh mục:
            <span class="required">
                 *
            </span>
            </label>

            <div class="col-md-10">
                <input type="text" class="form-control" name="title" placeholder="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Mô tả:
            <span class="required">
                 *
            </span>
            </label>

            <div class="col-md-10">
                <textarea class="form-control" name="description"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Danh mục cha:
            <span class="required">
                 *
            </span>
            </label>

            <div class="col-md-10">
                <div class="col-md-4">
                    {{Form::select('parent',[
                                '0'=>'No Parent',
                                '1'=>'Example 1',
                            ]
                    ,0,['class'=>'form-control'])}}
                </div>

            </div>
        </div>
    </div>
</div>