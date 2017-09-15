<div class="tab-pane active" id="tab_general">
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">Name:
            <span class="required">
                 *
            </span>
            </label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="product[name]" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">SKU:
            <span class="required">
                 *
            </span>
            </label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="product[sku]" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Price:
            <span class="required">
                 *
            </span>
            </label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="product[price]" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Description:
            <span class="required">
                 *
            </span>
            </label>
            <div class="col-md-10">
                <textarea class="form-control" name="product[description]"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Short Description:
            <span class="required">
                 *
            </span>
            </label>
            <div class="col-md-10">
                <textarea class="form-control" name="product[short_description]"></textarea>
                <span class="help-block">
                     shown in product listing
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Categories:
            <span class="required">
                 *
            </span>
            </label>
            <div class="col-md-10">
                <div class="form-control height-auto">
                    <div class="scroller" style="height:275px;" data-always-visible="1">
                        <ul class="list-unstyled">
                            <li>
                                <label><input type="checkbox" name="product[categories][]" value="1">Mens</label>
                                <ul class="list-unstyled">
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Footwear</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Clothing</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Accessories</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Fashion Outlet</label>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <label><input type="checkbox" name="product[categories][]" value="1">Football Shirts</label>
                                <ul class="list-unstyled">
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Premier League</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Football League</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Serie A</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Bundesliga</label>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <label><input type="checkbox" name="product[categories][]" value="1">Brands</label>
                                <ul class="list-unstyled">
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Adidas</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Nike</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Airwalk</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" name="product[categories][]" value="1">Kangol</label>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <span class="help-block">
                     select one or more categories
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Available Date:
            <span class="required">
                 *
            </span>
            </label>
            <div class="col-md-10">
                <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                    <input type="text" class="form-control" name="product[available_from]">
                    <span class="input-group-addon">
                         to
                    </span>
                    <input type="text" class="form-control" name="product[available_to]">
                </div>
                <span class="help-block">
                     availability daterange.
                </span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Tax Class:
            <span class="required">
                 *
            </span>
            </label>
            <div class="col-md-10">
                <select class="table-group-action-input form-control input-medium" name="product[tax_class]">
                    <option value="">Select...</option>
                    <option value="1">None</option>
                    <option value="0">Taxable Goods</option>
                    <option value="0">Shipping</option>
                    <option value="0">USA</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Status:
            <span class="required">
                 *
            </span>
            </label>
            <div class="col-md-10">
                <select class="table-group-action-input form-control input-medium" name="product[status]">
                    <option value="">Select...</option>
                    <option value="1">Published</option>
                    <option value="0">Not Published</option>
                </select>
            </div>
        </div>
    </div>
</div>