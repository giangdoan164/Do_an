          /**
             * Lay tat ca gia tri cua cac checkbox da duoc check tren form
             * @param string Ten doi tuong checkbox
             * @param string dau hieu phan cach giua cac gia tri duoc tra ve
             * @return string Xau the hien cac gia tri cua cac checkbox da duoc check, moi gia tri cach nhau boi dau hieu phan cach
             */
            function get_all_checked_checkbox(checkbox_name, separator) {
                //Chu y khi truyen tham tri: checkbox_name co dang document.forms[0].ten_checkbox
                var ret_string;
                var i;
                var int_checkbox_count;

                if (separator == null)
                    separator = ',';

                if (typeof (checkbox_name) == 'undefined')
                    return '';

                if (checkbox_name.length) {
                    int_checkbox_count = checkbox_name.length;
                } else {
                    int_checkbox_count = 0;
                }
                ret_string = "";

                if (!checkbox_name.length) {
                    if (checkbox_name.checked) {
                        ret_string = checkbox_name.value;
                    }
                } else {
                    for (i = 0; i < int_checkbox_count; i++) {
                        if (checkbox_name[i].checked) {
                            if (ret_string == "")
                                ret_string += checkbox_name[i].value;
                            else
                                ret_string += separator + checkbox_name[i].value;
                        }
                    }
                }

                return ret_string;
            }//end func get_all_checked_checkbox()




            function toggle_check_all(chk_obj, field) {
            if (chk_obj.checked) {
                check_all(field);
            }
            else {
                uncheck_all(field);
            }
        }

            function check_all(field) {

                if (field && field.length) {
                    for (i = 0; i < field.length; i++) {
                        if (!field[i].disabled) {
                            field[i].checked = true;
                        }
                    }
                } else {
                    if (field && !field.disabled) {
                        field.checked = true;
                    }
                }

            }

            function uncheck_all(field) {

                if (field && field.length) {
                    for (i = 0; i < field.length; i++) {
                        if (!field[i].disabled) {
                            field[i].checked = false;
                        }
                    }
                } else {
                    if (field && !field.disabled) {
                        field.checked = false;
                    }
                }

            }
            function set_value_chk(hdn_item_id_list)
                {
                    var f = document.frmMain;
                    var v_item_id = "0";
                    var v_item_id_list = "";
                    var error_message = 'Chưa có đối tượng nào được chọn!';

                    if (typeof(f.chk) == 'undefined' ){
                        alert(error_message);
                        return false;
                    }

                    v_item_id_list = get_all_checked_checkbox(f.chk,",");

                    if (v_item_id_list == ""){
                        alert(error_message);
                        return false;
                    }

                    f.hdn_item_id_list.value =  v_item_id_list;
                    return true;
                }

            function update_delete_onclick(record_id)
                {
                    var f = document.frmMain;
                    if(typeof record_id != 'undefined' && parseInt(record_id) >0)
                    {
                        $('#hdn_item_id_list').val(record_id);
                    }
                    else
                    {
                        var is_item_checked = set_value_chk(hdn_item_id_list);
                        if(!is_item_checked)
                        {
                            return false;
                        }
                    }
                    m = $("#controller").val() + f.hdn_delete_record_method.value;
                    $("#frmMain").attr("action", m);
                    if(confirm('Bạn chắc chắn xóa các đối tượng đã chọn?'))
                    {
                        f.submit();
                    }
                }
            function update_delete_parent_conctact_onclick(record_id)
                {
                    var f = document.frmMain;
                    if(typeof record_id != 'undefined' && parseInt(record_id) >0)
                    {
                        $('#hdn_item_id_list').val(record_id);
                    }
                    else
                    {
                        var is_item_checked = set_value_chk(hdn_item_id_list);
                        if(!is_item_checked)
                        {
                            return false;
                        }
                    }
                    m = $("#controller").val() + f.hdn_delete_record_method.value;
                    $("#frmMain").attr("action", m);
                    if(confirm('Bạn chắc chắn xóa thông tin liên lạc đã chọn?'))
                    {
                        f.submit();
                    }
                }
                
//            function update_delete_teacher_onclick(record_id)
//              {
//                    var f = document.frmMain;
//                    if(typeof record_id != 'undefined' && parseInt(record_id) >0)
//                    {
//                        $('#hdn_item_id_list').val(record_id);
//                    }
//                    else
//                    {
//                        var is_item_checked = set_value_chk(hdn_item_id_list);
//                        if(!is_item_checked)
//                        {
//                            return false;
//                        }
//                    }
//                    m = $("#controller").val() + f.hdn_delete_record_method.value;
//                    $("#frmMain").attr("action", m);
//                    if(confirm('Bạn chắc chắn xóa các đối tượng đã chọn?'))
//                    {
//                        f.submit();
//                    }
//                }
                
            function update_delete_category_onclick(record_id)
                {
                    var f = document.frmMain;
                    if(typeof record_id != 'undefined' && parseInt(record_id) >0)
                    {
                        $('#hdn_item_id_list').val(record_id);
                    }
                    else
                    {
                        var is_item_checked = set_value_chk(hdn_item_id_list);
                        if(!is_item_checked)
                        {
                            return false;
                        }
                    }
                    m = $("#controller").val() + f.hdn_delete_record_method.value;
                    $("#frmMain").attr("action", m);
                    if(confirm('Bạn chắc chắn xóa chuyên mục đã lựa chọn ? Toàn bộ các chủ đề, bài viết thuộc chuyên mục sẽ bị xóa!'))
                    {
                        f.submit();
                    }
                }
            function update_class_onclick(record_id)
                {
                    var f = document.frmMain;
                    if(typeof record_id != 'undefined' && parseInt(record_id) >0)
                    {
                        $('#hdn_item_id_list').val(record_id);
                    }
                    else
                    {
                        var is_item_checked = set_value_chk(hdn_item_id_list);
                        if(!is_item_checked)
                        {
                            return false;
                        }
                    }
                    m = $("#controller").val() + f.hdn_update_class.value;
                    $("#frmMain").attr("action", m);
                    if(confirm('Bạn chắc chắn  chuyển lớp các đối tượng đã chọn?'))
                    {
                        f.submit();
                    }
                }
       
          
            function btn_filter_onclick() {
                var f = document.frmMain;
                m = $("#controller").val() + f.hdn_dsp_all_record.value;
                $("#frmMain").attr("action", m);
                f.submit();
}

