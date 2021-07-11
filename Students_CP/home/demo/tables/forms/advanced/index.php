
            <ol class="breadcrumb bc-3">
                <li> <a href="https://demo.neontheme.com/dashboard/main/"><i class="fa-home"></i>Home</a> </li>
                <li> <a href="https://demo.neontheme.com/forms/main/">Forms</a> </li>
                <li class="active"> <strong>Advanced Plugins</strong> </li>
            </ol>
            <h2>Advanced Form Elements</h2> <br />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Multi Select Box
                            </div>
                            <div class="panel-options"> <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered">
                                <div class="form-group"> <label class="col-sm-3 control-label">Multi-Select List</label>
                                    <div class="col-sm-7"> <select multiple="multiple" name="my-select[]" class="form-control multi-select">
                                            <option value="elem_1">elem 1</option>
                                            <option value="elem_2">elem 2</option>
                                            <option value="elem_3">elem 3</option>
                                            <option value="elem_4">elem 4</option>
                                            <option value="elem_5">elem 5</option>
                                            <option value="elem_6">elem 6</option>
                                            <option value="elem_7">elem 7</option>
                                            <option value="elem_8" selected>Selected element</option>
                                            <option value="elem_9" selected>Selected element 2</option>
                                        </select> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Date Range Picker
                            </div>
                            <div class="panel-options"> <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered">
                                <div class="form-group"> <label class="col-sm-3 control-label">Date Range Picker</label>
                                    <div class="col-sm-5"> <input type="text" class="form-control daterange" /> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Selected Date Range</label>
                                    <div class="col-sm-5"> <input type="text" class="form-control daterange" data-format="YYYY-MM-DD" data-start-date="2013-08-02" data-end-date="2013-08-15" data-separator="," /> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Disabled Date Range</label>
                                    <div class="col-sm-5"> <input type="text" class="form-control daterange" data-min-date="06-27-2021" data-max-date="07-08-2021" /> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Date Range Callback</label>
                                    <div class="col-sm-5"> <input type="text" class="form-control daterange" data-callback /> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Date Range with Timepicker</label>
                                    <div class="col-sm-5"> <input type="text" class="form-control daterange" data-time-picker="true" data-time-picker-increment="5" data-format="MM/DD/YYYY h:mm A" /> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Date Range Inline</label>
                                    <div class="col-sm-5">
                                        <div class="daterange daterange-inline" data-format="MMMM D, YYYY" data-start-date="June 18, 2021" data-end-date="July 2, 2021"> <i class="entypo-calendar"></i> <span>June 18, 2021 - July 2, 2021</span> </div>
                                    </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Date Range w/ Predefined Ranges</label>
                                    <div class="col-sm-5">
                                        <div class="daterange daterange-inline add-ranges" data-format="MMMM D, YYYY" data-start-date="June 17, 2021" data-end-date="July 12, 2021"> <i class="entypo-calendar"></i> <span>June 17, 2021 - July 12, 2021</span> </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Date Picker
                            </div>
                            <div class="panel-options"> <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered">
                                <div class="form-group"> <label class="col-sm-3 control-label">Date Picker (inline)</label>
                                    <div class="col-sm-5">
                                        <div class="datepicker"></div>
                                    </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Date Picker (popup)</label>
                                    <div class="col-sm-3">
                                        <div class="input-group"> <input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
                                            <div class="input-group-addon"> <a href="#"><i class="entypo-calendar"></i></a> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Date Picker (start/end date)</label>
                                    <div class="col-sm-3"> <input type="text" class="form-control datepicker" data-start-date="-2d" data-end-date="+1w"> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Date Picker (disabled days Mo, We)</label>
                                    <div class="col-sm-3"> <input type="text" class="form-control datepicker" data-disabled-days="1,3"> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">2 Clicks Date Select</label>
                                    <div class="col-sm-3"> <input type="text" class="form-control datepicker" data-start-view="1"> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">3 Clicks Date Select</label>
                                    <div class="col-sm-3"> <input type="text" class="form-control datepicker" data-start-view="2"> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Time Picker
                            </div>
                            <div class="panel-options"> <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered">
                                <div class="form-group"> <label class="col-sm-3 control-label">Time Picker (Simple)</label>
                                    <div class="col-sm-2">
                                        <div class="input-group minimal">
                                            <div class="input-group-addon"> <i class="entypo-clock"></i> </div> <input type="text" class="form-control timepicker" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Time Picker (Dropdown)</label>
                                    <div class="col-sm-3"> <input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" /> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Time Picker (input-group)</label>
                                    <div class="col-sm-2">
                                        <div class="input-group"> <input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
                                            <div class="input-group-addon"> <a href="#"><i class="entypo-clock"></i></a> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Time &amp; Date Picker</label>
                                    <div class="col-sm-3">
                                        <div class="date-and-time"> <input type="text" class="form-control datepicker" data-format="D, dd MM yyyy"> <input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" /> </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Color Picker
                            </div>
                            <div class="panel-options"> <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered">
                                <div class="form-group"> <label class="col-sm-3 control-label">Color Picker (Simple)</label>
                                    <div class="col-sm-3"> <input type="text" class="form-control colorpicker" /> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Color Picker (RGBA)</label>
                                    <div class="col-sm-3"> <input type="text" class="form-control colorpicker" data-format="rgba" /> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Color Picker (Horizontal)</label>
                                    <div class="col-sm-3"> <input type="text" class="form-control colorpicker" data-horizontal="true" /> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Color Picker Droplet</label>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-addon"> <a href="#"><i class="entypo-droplet"></i></a> </div> <input type="text" class="form-control colorpicker" data-format="hex" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Color Picker Color Preview</label>
                                    <div class="col-sm-2">
                                        <div class="input-group"> <input type="text" class="form-control colorpicker" data-format="hex" value="#5a3d3d" />
                                            <div class="input-group-addon"> <i class="color-preview"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Selectbox Replacement
                            </div>
                            <div class="panel-options"> <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered"> <strong>Select2 Plugin</strong> <br />
                                <div class="form-group"> <label class="col-sm-3 control-label">Select2</label>
                                    <div class="col-sm-5"> <select name="test" class="select2" data-allow-clear="true" data-placeholder="Select one city...">
                                            <option></option>
                                            <optgroup label="United States">
                                                <option value="1">Alabama</option>
                                                <option value="2">Boston</option>
                                                <option value="3">Ohaio</option>
                                                <option value="4">New York</option>
                                                <option value="5">Washington</option>
                                            </optgroup>
                                        </select> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Select2 Multiple</label>
                                    <div class="col-sm-5"> <select name="test" class="select2" multiple>
                                            <option value="3">Ohaio</option>
                                            <option value="2">Boston</option>
                                            <option value="5">Washington</option>
                                            <option value="1">Alabama</option>
                                            <option value="4">New York</option>
                                            <option value="12">Bostons</option>
                                            <option value="11">Alabama</option>
                                            <option value="13">Ohaio</option>
                                            <option value="14">New York</option>
                                            <option value="15">Washington II</option>
                                        </select> </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered"> <strong>SelectBoxIt Plugin</strong> <br />
                                <div class="form-group"> <label class="col-sm-3 control-label">SelectBoxIt</label>
                                    <div class="col-sm-5"> <select name="test" class="selectboxit">
                                            <optgroup label="United States">
                                                <option value="1">Alabama</option>
                                                <option value="2">Boston</option>
                                                <option value="3">Ohaio</option>
                                                <option value="4">New York</option>
                                                <option value="5">Washington</option>
                                            </optgroup>
                                        </select> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">SelectBoxIt (No first-option)</label>
                                    <div class="col-sm-5"> <select name="test" class="selectboxit" data-first-option="false">
                                            <option>Select city</option>
                                            <option value="1">Alabama</option>
                                            <option value="2">Boston</option>
                                            <option value="3">Ohaio</option>
                                            <option value="4">New York</option>
                                            <option value="5">Washington</option>
                                        </select> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">SelectBoxIt (native)</label>
                                    <div class="col-sm-5"> <select name="test" class="selectboxit" data-native="true" data-text="Select city (+attribute placeholder)">
                                            <option value="1">Alabama</option>
                                            <option value="2">Boston</option>
                                            <option value="3">Ohaio</option>
                                            <option value="4">New York</option>
                                            <option value="5">Washington</option>
                                        </select> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">SelectBoxIt (Icons)</label>
                                    <div class="col-sm-5"> <select name="test" class="selectboxit">
                                            <option value="SelectBoxIt themes:" data-iconurl="../../../icons.iconarchive.com/icons/custom-icon-design/pretty-office-5/256/themes-icon.png">SelectBoxIt themes:</option>
                                            <option value="Twitter Bootstrap" data-iconurl="../../../icons.iconarchive.com/icons/graphicloads/colorful-long-shadow/256/Html-tags-icon.png">Twitter Bootstrap</option>
                                            <option value="jQuery UI" data-iconurl="../../../icons.iconarchive.com/icons/sicons/basic-round-social/256/jquery-icon.png">jQuery UI</option>
                                            <option value="jQuery Mobile" data-iconurl="../../../icons.iconarchive.com/icons/pelfusion/long-shadow-media/256/Mobile-Smartphone-icon.png">jQuery Mobile</option>
                                        </select> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Tags Input
                            </div>
                            <div class="panel-options"> <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered">
                                <div class="form-group"> <label class="col-sm-3 control-label">Tags Input</label>
                                    <div class="col-sm-5"> <input type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo" class="form-control tagsinput" /> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Typeahead Auto Complete
                            </div>
                            <div class="panel-options"> <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered">
                                <div class="form-group"> <label class="col-sm-3 control-label">Autosuggest (Local)</label>
                                    <div class="col-sm-5">
                                        <div class="input-group"> <span class="input-group-addon"><i class="entypo-user"></i></span> <input type="text" name="typeahead_local" class="form-control typeahead" data-local="arlind,art,laborator,simon,dean,frank,quintin,walker,emily,jonnatan,huston,miley,kate,lisa,tim" /> </div>
                                    </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Autosuggest (Pre-fetched)</label>
                                    <div class="col-sm-5">
                                        <div class="input-group"> <input type="text" name="typeahead_prefetch" class="form-control typeahead" data-prefetch="https://demo.neontheme.com/data/countries.json" placeholder="Countries" /> <span class="input-group-addon"><i class="entypo-globe"></i></span> </div>
                                    </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Autosuggest (Remote-Query)</label>
                                    <div class="col-sm-5"> <input type="text" name="typeahead_remote" class="form-control typeahead" data-remote="https://demo.neontheme.com/data/autosuggest-remote.php?q=%QUERY" placeholder="Randomized Output" /> </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Autosuggest (Custom Structure)</label>
                                    <div class="col-sm-5"> <input type="text" name="typeahead_custom" class="form-control typeahead" data-remote="https://demo.neontheme.com/data/autosuggest-custom.php?q=%QUERY" data-template="<div class='thumb-entry'><span class='image'><img src='%7b%7bimg%7d%7d.html' width=40 height=40 /></span><span class='text'><strong>{{value}}</strong><em>{{desc}}</em></span></div>" placeholder="Thumbnails Included" /> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <br />
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        iCheck - Custom checkbox and radio buttons
                    </h2>
                </div>
            </div> <br />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                iCheck Examples
                            </div>
                            <div class="panel-options"> <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="icheck-list">
                                        <li> <input tabindex="5" type="checkbox" class="icheck" id="minimal-checkbox-1"> <label for="minimal-checkbox-1">Checkbox 1</label> </li>
                                        <li> <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2" checked> <label for="minimal-checkbox-2">Checkbox 2</label> </li>
                                        <li> <input type="checkbox" class="icheck" id="minimal-checkbox-disabled" disabled> <label for="minimal-checkbox-disabled">Disabled</label> </li>
                                        <li> <input type="checkbox" class="icheck" id="minimal-checkbox-disabled-checked" checked disabled> <label for="minimal-checkbox-disabled-checked">Disabled &amp; checked</label> </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="icheck-list">
                                        <li> <input tabindex="7" class="icheck" type="radio" id="minimal-radio-1" name="minimal-radio"> <label for="minimal-radio-1">Radio button 1</label> </li>
                                        <li> <input tabindex="8" class="icheck" type="radio" id="minimal-radio-2" name="minimal-radio" checked> <label for="minimal-radio-2">Radio button 2</label> </li>
                                        <li> <input type="radio" class="icheck" id="minimal-radio-disabled" disabled> <label for="minimal-radio-disabled">Disabled</label> </li>
                                        <li> <input type="radio" class="icheck" id="minimal-radio-disabled-checked" checked disabled> <label for="minimal-radio-disabled-checked">Disabled &amp; checked</label> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12"> <strong>Skins &amp; Styles</strong> <br /> <br /> </div>
                                <div class="col-sm-6">
                                    <ul class="icheck-list">
                                        <li> <input tabindex="5" type="checkbox" class="icheck-2" id="minimal-checkbox-1-2"> <label for="minimal-checkbox-1-2">Checkbox 1</label> </li>
                                        <li> <input tabindex="6" type="checkbox" class="icheck-2" id="minimal-checkbox-2-2" checked> <label for="minimal-checkbox-2-2">Checkbox 2</label> </li>
                                        <li> <input type="checkbox" class="icheck-2" id="minimal-checkbox-disabled-2" disabled> <label for="minimal-checkbox-disabled-2">Disabled</label> </li>
                                        <li> <input type="checkbox" class="icheck-2" id="minimal-checkbox-disabled-checked-2" checked disabled> <label for="minimal-checkbox-disabled-checked-2">Disabled &amp; checked</label> </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="icheck-list">
                                        <li> <input class="icheck-2" type="radio" id="minimal-radio-1-2" name="minimal-radio"> <label for="minimal-radio-1-2">Radio button 1</label> </li>
                                        <li> <input tabindex="8" class="icheck-2" type="radio" id="minimal-radio-2-2" name="minimal-radio" checked> <label for="minimal-radio-2-2">Radio button 2</label> </li>
                                        <li> <input type="radio" class="icheck-2" id="minimal-radio-disabled-2-2" disabled> <label for="minimal-radio-disabled-2-2">Disabled</label> </li>
                                        <li> <input type="radio" class="icheck-2" id="minimal-radio-disabled-checked-2" checked disabled> <label for="minimal-radio-disabled-checked-2">Disabled &amp; checked</label> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> <br /> <br /> <strong>Select Skin</strong>
                                    <div class="icheck-skins"> <a href="#" data-color-class=""></a> <a href="#" data-color-class="red"></a> <a href="#" data-color-class="green"></a> <a href="#" class="current" data-color-class="blue"></a> <a href="#" data-color-class="aero"></a> <a href="#" data-color-class="grey"></a> <a href="#" data-color-class="orange"></a> <a href="#" data-color-class="yellow"></a> <a href="#" data-color-class="pink"></a> <a href="#" data-color-class="purple"></a> </div>
                                </div>
                                <div class="col-md-6"> <br /> <br /> <strong>Select Style</strong> <br />
                                    <div class="row">
                                        <div class="col-sm-6"> <select id="icheck-style" class="selectboxit">
                                                <option value="minimal">Minimal</option>
                                                <option value="square">Square</option>
                                                <option value="flat">Flat</option>
                                                <option value="futurico">Futurico</option>
                                                <option value="polaris">Polaris</option>
                                            </select> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body"> <a href="https://demo.neontheme.com/forms/icheck/" class="btn btn-default">
                                More iCheck Examples
                                <i class="entypo-right"></i> </a> </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $('input.icheck').iCheck({
                        checkboxClass: 'icheckbox_minimal',
                        radioClass: 'iradio_minimal'
                    });
                    $('input.icheck-2').iCheck({
                        checkboxClass: 'icheckbox_minimal-blue',
                        radioClass: 'iradio_minimal-blue'
                    });
                });

                jQuery(document).ready(function($) {
                    var icheck_skins = $(".icheck-skins a");
                    icheck_skins.click(function(ev) {
                        ev.preventDefault();
                        icheck_skins.removeClass('current');
                        $(this).addClass('current');
                        updateiCheckSkinandStyle();
                    });
                    $("#icheck-style").change(updateiCheckSkinandStyle);
                });

                function updateiCheckSkinandStyle() {
                    var skin = $(".icheck-skins a.current").data('color-class'),
                        style = $("#icheck-style").val();
                    var cb_class = 'icheckbox_' + style + (skin.length ? ("-" + skin) : ''),
                        rd_class = 'iradio_' + style + (skin.length ? ("-" + skin) : '');
                    if (style == 'futurico' || style == 'polaris') {
                        cb_class = cb_class.replace('-' + skin, '');
                        rd_class = rd_class.replace('-' + skin, '');
                    }
                    $('input.icheck-2').iCheck('destroy');
                    $('input.icheck-2').iCheck({
                        checkboxClass: cb_class,
                        radioClass: rd_class
                    });
                }
            </script> <br />
            