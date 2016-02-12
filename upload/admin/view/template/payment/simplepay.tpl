<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-pp-pro-uk" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
      <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
    <?php } ?>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-pp-pro-uk" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-live-demo"><span data-toggle="tooltip" title="<?php echo $help_test; ?>"><?php echo $entry_test; ?></span></label>
            <div class="col-sm-10">
              <select name="simplepay_test" id="input-live-demo" class="form-control">
                <?php if ($simplepay_test) { ?>
                  <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                  <option value="0"><?php echo $text_no; ?></option>
                <?php } else { ?>
                  <option value="1"><?php echo $text_yes; ?></option>
                  <option value="0" selected="selected"><?php echo $text_no; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="entry-private-live-key"><?php echo $entry_private_live_key; ?></label>
            <div class="col-sm-10">
              <input type="text" name="simplepay_private_live_key" value="<?php echo $simplepay_private_live_key; ?>" placeholder="<?php echo $entry_private_live_key; ?>" id="entry-private-live-key" class="form-control"/>
              <?php if ($error_private_live_key) { ?>
                <div class="text-danger"><?php echo $error_private_live_key; ?></div>
              <?php } ?>
            </div>
          </div>
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="entry-public-live-key"><?php echo $entry_public_live_key; ?></label>
            <div class="col-sm-10">
              <input type="text" name="simplepay_public_live_key" value="<?php echo $simplepay_public_live_key; ?>" placeholder="<?php echo $entry_public_live_key; ?>" id="entry-public-live-key" class="form-control"/>
              <?php if ($error_public_live_key) { ?>
                <div class="text-danger"><?php echo $error_public_live_key; ?></div>
              <?php } ?>
            </div>
          </div>
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="entry-private-test-key"><?php echo $entry_private_test_key; ?></label>
            <div class="col-sm-10">
              <input type="text" name="simplepay_private_test_key" value="<?php echo $simplepay_private_test_key; ?>" placeholder="<?php echo $entry_private_test_key; ?>" id="entry-private-test-key" class="form-control"/>
              <?php if ($error_private_test_key) { ?>
                <div class="text-danger"><?php echo $error_private_test_key; ?></div>
              <?php } ?>
            </div>
          </div>
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="entry-public-test-key"><?php echo $entry_public_test_key; ?></label>
            <div class="col-sm-10">
              <input type="text" name="simplepay_public_test_key" value="<?php echo $simplepay_public_test_key; ?>" placeholder="<?php echo $entry_public_test_key; ?>" id="entry-public-test-key" class="form-control"/>
              <?php if ($error_public_test_key) { ?>
                <div class="text-danger"><?php echo $error_public_test_key; ?></div>
              <?php } ?>
            </div>
          </div>

          <div class="form-group required">
            <label class="col-sm-2 control-label" for="entry-description"><span data-toggle="tooltip" title="<?php echo $help_description; ?>"><?php echo $entry_description; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="simplepay_description" value="<?php echo $simplepay_description; ?>" placeholder="<?php echo $entry_description; ?>" id="entry-description" class="form-control" maxlength="50"/>
              <?php if ($error_description) { ?>
                <div class="text-danger"><?php echo $error_description; ?></div>
              <?php } ?>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="entry-image"><span data-toggle="tooltip" title="<?php echo $help_image; ?>"><?php echo $entry_image; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="simplepay_image" value="<?php echo $simplepay_image; ?>" placeholder="<?php echo $entry_image; ?>" id="entry-image" class="form-control" />
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="simplepay_status" id="input-status" class="form-control">
                <?php if ($simplepay_status) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>