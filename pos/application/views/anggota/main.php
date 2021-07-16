<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo flash_msg(); ?>
                <form class="form-horizontal" action="<?php echo  base_url('pendaftaran_anggota/update')?>" method="post" id="form-user">
                     <?php foreach ($data_anggota->result() as $row): ?>  
                <input type="hidden" id="id_anggota" name="id_anggota" value="<?php echo $row->id_anggota ?>">
                <input type="hidden" name="username" value="<?php echo $user['username'] ?>">                          
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_anggota" placeholder="Username"  value="<?php echo $row->nama_anggota ?>" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea type="alamat" required="" id="alamat" class="form-control" name="alamat"><?php echo $row->alamat ?></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">No Telepon</label>
                        <div class="col-sm-8">
                            <input type="text" id="phone" class="form-control" name="no_telepon"  placeholder="No telepon" required="" value="<?php echo $row->no_tlp ?>">
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-8">
                            <input type="text" id="input-valid-email" class="form-control" name="status"  readonly="" value="<?php echo $row->status  ?>">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tempat Lahir</label>
                        <div class="col-sm-8">
                            <input type="tempat_lahir" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $row->tempat_lahir  ?>" required="">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="tanggal_lahir" required="" value="<?php echo $row->tanggal_lahir ?>">
                        </div>
                    </div>
                    <fieldset class="well">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Old Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="old_password" placeholder="Old Password" id="old-password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="new_password" placeholder="New Password" id="new-password">
                                <span id="show-errors" class="error-strength"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" id="new-confirm-password">
                                <div id="PasswordMatch" class="error-strength"></div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                            <div class="pull-right">
                                <button class="btn btn-default" type="submit">EDIT</button>
                            </div>
                        </div>
                    </div>
                    <?php  endforeach ?>
                </form>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div>
</section>
<script type="text/javascript">
   $(function () {   
    function equalPass() {
        var password = $('#new-password').val();
        var confirmPassword = $('#new-confirm-password').val();
        if (password.length && confirmPassword.length > 1) {
            if (password === confirmPassword) {
                $("#PasswordMatch").html('<span class="help-block" style="color:#5cb85c !important">Passwords match.</span>');
                return true;
            } else {
                $("#PasswordMatch").html('<span class="help-block" style="color:#FF0000 !important">Passwords do not match!</span>');
                return false;
            }
        }
    }

    $('#form-user').on('init.field.fv', function (e, data) {
        var field = data.field, $field = data.element, bv = data.fv;

        var $span = $('<small/>')
                .addClass('help-block validMessage')
                .attr('data-field', field)
                .insertAfter($field)
                .hide();

        var message = bv.getOptions(field).validMessage;
        if (message) {
            $span.html(message);
        }
    }).formValidation({
        icon: {
            valid: 'fa',
            invalid: 'fa',
            validating: 'fa fa-refresh'
        },
        fields: {            
            confirm_password: {
                validMessage: 'Password is match',
                validators: {
                    identical: {
                        field: "new_password",
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    }).on('success.field.fv', function (e, data) {
        var field = data.field, $field = data.element;
        $field.next('.validMessage[data-field="' + field + '"]').show();
    }).on('err.field.fv', function (e, data) {
        var field = data.field, $field = data.element;
        $field.next('.validMessage[data-field="' + field + '"]').hide();
    });

    $("#new-password").strength({
        strengthClass: 'strength',
        strengthMeterClass: 'popover_meter',
        strengthButtonClass: 'button_strength'
    });
    $("#new-password").blur(function () {
        $(".popover_meter").fadeOut("fast");
    });
})

</script>