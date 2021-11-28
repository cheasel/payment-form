////    Check ID input  ////
$(document).ready(function() {
    $('#id').on('keyup', function() {
        if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
            id = $(this).val().replace(/-/g, "");
            var result = Script_checkID(id);
            if (result === false) {
                fail_validate('id_error', 'เลขบัตรไม่ถูกต้อง');
            } else {
                success_validate('id_error', 'เลขบัตรถูกต้อง');
            }
        } else {
            fail_validate('id_error', 'เลขบัตรไม่ครบ');
        }
    })
});

////    Check Phone Number input    ////
$(document).ready(function() {
    $('#tel').on('keyup', function() {
        if ($.trim($(this).val()) != '' && $(this).val().length == 10) {
            phone = $(this).val();
            var result = isPhoneNo(phone);
            if (result === false) {
                fail_validate('phone_error', 'รูปแบบเบอร์โทรผิด');
            } else {
                success_validate('phone_error', 'รูปแบบเบอร์โทรถูกต้อง');
            }
        } else {
            fail_validate('phone_error', 'เบอร์โทรไม่ครบ');
        }
    })
});

////    Show success validation     ////
function success_validate(id, text) {
    $('#' + id).addClass('true').text(text);
}

////    Show fail validation    ////
function fail_validate(id, text) {
    $('#' + id).removeClass('true').text(text);
}

////    ID Card Validation  ////
function Script_checkID(id) {
    if (!IsNumeric(id)) return false;
    if (id.substring(0, 1) == 0) return false;
    if (id.length != 13) return false;
    for (i = 0, sum = 0; i < 12; i++)
        sum += parseFloat(id.charAt(i)) * (13 - i);
    if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
    return true;
}

function IsNumeric(input) {
    var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
    return (RE.test(input));
}

////    Phone Number Validation    ////
function isPhoneNo(input) {
    var regExp = /^0[0-9]{8,9}$/i;
    return regExp.test(input);
}